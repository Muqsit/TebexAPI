<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection;

use muqsit\tebexapi\connection\request\TebexRequest;
use muqsit\tebexapi\connection\response\TebexResponseHandler;

/**
 * TebexConnection handles requesting and answering of Tebex's API
 * endpoints in the form of TebexRequest.
 */
interface TebexConnection{

	/**
	 * Queues a request to be fulfilled, and notifies the callback
	 * with the result.
	 *
	 * @param TebexRequest $request
	 * @param TebexResponseHandler $callback
	 *
	 * @phpstan-template TTebexResponse of \muqsit\tebexapi\connection\response\TebexResponse
	 * @phpstan-param TebexRequest<TTebexResponse> $request
	 * @phpstan-param TebexResponseHandler<TTebexResponse> $callback
	 */
	public function request(TebexRequest $request, TebexResponseHandler $callback) : void;

	/**
	 * Returns last known latency with Tebex API (in seconds).
	 *
	 * @return float
	 */
	public function getLatency() : float;

	/**
	 * Processes queued requests.
	 */
	public function process() : void;

	/**
	 * Blocks thread until all scheduled requests are fulfilled.
	 */
	public function wait() : void;

	/**
	 * Closes the connection.
	 */
	public function disconnect() : void;
}