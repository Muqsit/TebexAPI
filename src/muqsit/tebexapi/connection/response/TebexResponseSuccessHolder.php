<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\response;

/**
 * @template TTebexResponse of TebexResponse
 * @extends TebexResponseHolder<TTebexResponse>
 */
final class TebexResponseSuccessHolder extends TebexResponseHolder{

	/** @var TTebexResponse */
	private TebexResponse $response;

	/**
	 * @param int $handler_id
	 * @param float $latency
	 * @param TTebexResponse $response
	 */
	public function __construct(int $handler_id, float $latency, TebexResponse $response){
		parent::__construct($handler_id, $latency);
		$this->response = $response;
	}

	public function trigger(TebexResponseHandler $handler) : void{
		($handler->on_success)($this->response);
	}
}