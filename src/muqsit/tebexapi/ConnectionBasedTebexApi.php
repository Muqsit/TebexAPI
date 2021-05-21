<?php

declare(strict_types=1);

namespace muqsit\tebexapi;

use muqsit\tebexapi\connection\request\TebexRequest;
use muqsit\tebexapi\connection\response\TebexResponseHandler;
use muqsit\tebexapi\connection\TebexConnection;

/**
 * A simple TebexConnection-based implementation of TebexApi.
 * Usage:
 * 	$api = new ConnectionBasedTebexApi($connection);
 * 	while($do_processing){
 * 		$api->process();
 * 	}
 * 	$api->disconnect();
 */
final class ConnectionBasedTebexApi extends BaseTebexApi{

	private TebexConnection $connection;

	public function __construct(TebexConnection $connection){
		$this->connection = $connection;
	}

	public function request(TebexRequest $request, TebexResponseHandler $callback) : void{
		$this->connection->request($request, $callback);
	}

	public function getLatency() : float{
		return $this->connection->getLatency();
	}

	public function process() : void{
		$this->connection->process();
	}

	public function wait() : void{
		$this->connection->wait();
	}

	public function disconnect() : void{
		$this->connection->disconnect();
	}
}