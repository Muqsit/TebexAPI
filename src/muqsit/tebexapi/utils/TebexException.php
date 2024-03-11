<?php

declare(strict_types=1);

namespace muqsit\tebexapi\utils;

use RuntimeException;
use Throwable;

class TebexException extends RuntimeException{

	private float $latency;
	public ?string $extra_trace = null;

	public function __construct(string $message = "", float $latency = 0.0, int $code = 0, ?Throwable $previous = null){
		parent::__construct($message, $code, $previous);
		$this->latency = $latency;
	}

	public function getLatency() : float{
		return $this->latency;
	}
}