<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\request;

/**
 * @phpstan-template TTebexResponse of \muqsit\tebexapi\connection\response\TebexResponse
 * @phpstan-implements TebexRequest<TTebexResponse>
 */
abstract class TebexDeleteRequest implements TebexRequest{

	public function addAdditionalCurlOpts(array &$curl_opts) : void{
		$curl_opts[CURLOPT_POST] = true;
		$curl_opts[CURLOPT_CUSTOMREQUEST] = "DELETE";
		$curl_opts[CURLOPT_POSTFIELDS] = $this->getPOSTFields();
	}

	abstract protected function getPOSTFields() : string;
}