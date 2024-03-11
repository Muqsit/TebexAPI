<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\handler;

use JsonException;
use muqsit\tebexapi\connection\request\TebexRequestHolder;
use muqsit\tebexapi\connection\response\TebexResponseHolder;
use muqsit\tebexapi\connection\response\TebexResponseSuccessHolder;
use muqsit\tebexapi\TebexApiStatics;
use muqsit\tebexapi\utils\TebexException;
use muqsit\tebexapi\utils\UnexpectedResponseCodeTebexException;
use function array_key_exists;
use function base64_encode;
use function curl_errno;
use function curl_error;
use function is_string;

/**
 * A simple implementation of a cURL handler.
 */
final class SimpleTebexConnectionHandler implements TebexConnectionHandler{

	public function handle(TebexRequestHolder $request_holder, array $default_curl_options) : TebexResponseHolder{
		$request = $request_holder->request;
		$ch = curl_init(TebexApiStatics::ENDPOINT . $request->getEndpoint());
		$ch !== false || throw new TebexException("cURL request failed during initialization", 5000);
		try{
			$curl_opts = $default_curl_options;
			$request->addAdditionalCurlOpts($curl_opts);
			curl_setopt_array($ch, $curl_opts);

			$body = curl_exec($ch);

			/** @var float $latency */
			$latency = curl_getinfo($ch, CURLINFO_TOTAL_TIME);

			is_string($body) || throw new TebexException("cURL request failed {" . curl_errno($ch) . "): " . curl_error($ch));

			/** @var int $response_code */
			$response_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

			if($response_code !== $request->getExpectedResponseCode()){
				try{
					/** @var array{error_message: string} $message_body */
					$message_body = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
				}catch(JsonException){
					$message_body = [];
				}
				!array_key_exists("error_message", $message_body) || throw new TebexException($message_body["error_message"], $latency, $message_body["error_code"] ?? 0);
				throw UnexpectedResponseCodeTebexException::fromResponseCode($request->getExpectedResponseCode(), $response_code);
			}

			if($body === ""){
				$result = [];
			}else{
				try{
					/** @var array<string, mixed>|null $result */
					$result = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
				}catch(JsonException $e){
					throw new TebexException("{$e->getMessage()} during parsing JSON body: " . base64_encode($body));
				}
				$result !== null || throw new TebexException("Error during parsing JSON body: " . base64_encode($body));
			}

			if(isset($result["error_code"], $result["error_message"])){
				assert(is_string($result["error_message"]));
				throw new TebexException($result["error_message"], $latency, $result["error_code"]);
			}

			return new TebexResponseSuccessHolder($request_holder->handler_id, $latency, $request->createResponse($result));
		}finally{
			curl_close($ch);
		}
	}
}