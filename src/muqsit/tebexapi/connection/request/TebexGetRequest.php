<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\request;

use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @template TTebexResponse of TebexResponse
 * @implements TebexRequest<TTebexResponse>
 */
abstract class TebexGetRequest implements TebexRequest{

	public function addAdditionalCurlOpts(array &$curl_opts) : void{
	}
}