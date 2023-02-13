<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\response;

/**
 * @template TTebexResponse of TebexResponse
 */
abstract class TebexResponseHolder{

	public int $handler_id;
	public float $latency;

	public function __construct(int $handler_id, float $latency){
		$this->handler_id = $handler_id;
		$this->latency = $latency;
	}

	/**
	 * @param TebexResponseHandler<TTebexResponse> $handler
	 */
	abstract public function trigger(TebexResponseHandler $handler) : void;
}