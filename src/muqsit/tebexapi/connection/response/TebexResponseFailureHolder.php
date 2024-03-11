<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\response;

use muqsit\tebexapi\utils\TebexException;

/**
 * @template TTebexResponse of TebexResponse
 * @extends TebexResponseHolder<TTebexResponse>
 */
final class TebexResponseFailureHolder extends TebexResponseHolder{

	readonly public string $error;
	readonly public int $code;
	readonly public string $trace;

	public function __construct(int $handler_id, float $latency, string $error, int $code, string $trace){
		parent::__construct($handler_id, $latency);
		$this->error = $error;
		$this->code = $code;
		$this->trace = $trace;
	}

	public function trigger(TebexResponseHandler $handler) : void{
		$exception = new TebexException($this->error, $this->latency, $this->code, null);
		$exception->extra_trace = $this->trace;
		($handler->on_failure)($exception);
	}
}