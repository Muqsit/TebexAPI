<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\giftcards;

use muqsit\tebexapi\connection\request\TebexGetRequest;
use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @phpstan-extends TebexGetRequest<TebexGiftCard>
 */
final class TebexGiftCardRequest extends TebexGetRequest{

	private int $id;

	public function __construct(int $id){
		$this->id = $id;
	}

	public function getEndpoint() : string{
		return "/giftcards";
	}

	public function getExpectedResponseCode() : int{
		return 200;
	}

	/**
	 * @param array<string, mixed> $response
	 * @return TebexResponse
	 *
	 * @phpstan-param array{data: array<string, mixed>} $response
	 */
	public function createResponse(array $response) : TebexResponse{
		return TebexGiftCard::fromTebexResponse($response["data"]);
	}

	public function addAdditionalCurlOpts(array &$curl_opts) : void{
		parent::addAdditionalCurlOpts($curl_opts);
		$curl_opts[CURLOPT_POSTFIELDS] = http_build_query(["id" => $this->id]);
	}
}