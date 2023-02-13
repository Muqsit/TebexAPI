<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\request;

use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @template TTebexResponse of TebexResponse
 */
interface TebexRequest{

	/**
	 * Add any additional curl data like POST fields or
	 * headers over here.
	 * @param array<int, mixed> $curl_opts
	 */
	public function addAdditionalCurlOpts(array &$curl_opts) : void;

	/**
	 * Returns the relative path to endpoint this request
	 * is targeted to.
	 * For example: /information
	 *
	 * @return string
	 */
	public function getEndpoint() : string;

	/**
	 * The expected HTTP response code from Tebex.
	 * If the response code mismatches, it will be considered an
	 * unfulfilled request and result in a TebexException.
	 *
	 * @return int
	 */
	public function getExpectedResponseCode() : int;

	/**
	 * Creates a response object out of JSON formatted response
	 * data obtained from the API.
	 *
	 * @param mixed[] $response
	 * @return TTebexResponse
	 */
	public function createResponse(array $response) : TebexResponse;
}