<?php

declare(strict_types=1);

namespace muqsit\tebexapi\utils;

use Throwable;

class UnexpectedResponseCodeTebexException extends TebexException{

	public static function fromResponseCode(int $expected_code, int $received_code, float $latency = 0.0) : self{
		return new self("Expected response code {$expected_code}, got {$received_code}", $latency, 0, null, $expected_code, $received_code);
	}

	private int $expected_response_code;
	private int $received_response_code;

	public function __construct(string $message = "", float $latency = 0.0, int $code = 0, Throwable $previous = null, int $expected_response_code = 0, int $received_response_code = 0){
		parent::__construct($message, $latency, $code, $previous);
		$this->expected_response_code = $expected_response_code;
		$this->received_response_code = $received_response_code;
	}

	public function getExpectedResponseCode() : int{
		return $this->expected_response_code;
	}

	public function getReceivedResponseCode() : int{
		return $this->received_response_code;
	}
}