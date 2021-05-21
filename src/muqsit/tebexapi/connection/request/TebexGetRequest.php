<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\request;

/**
 * @phpstan-template TTebexResponse of \muqsit\tebexapi\connection\response\TebexResponse
 * @phpstan-implements TebexRequest<TTebexResponse>
 */
abstract class TebexGetRequest implements TebexRequest{

	public function addAdditionalCurlOpts(array &$curl_opts) : void{
	}
}