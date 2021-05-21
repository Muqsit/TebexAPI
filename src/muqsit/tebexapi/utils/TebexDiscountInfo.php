<?php

declare(strict_types=1);

namespace muqsit\tebexapi\utils;

final class TebexDiscountInfo{

	/**
	 * @param array<string, mixed> $response
	 * @return self
	 */
	public static function fromTebexResponse(array $response) : self{
		/**
		 * @var array{
		 * 		type: string,
		 * 		percentage: int,
		 * 		value: int
		 * } $response
		 */

		return new self(
			$response["type"],
			$response["percentage"],
			$response["value"]
		);
	}

	private string $type;
	private int $percentage;
	private int $value;

	public function __construct(string $type, int $percentage, int $value){
		$this->type = $type;
		$this->percentage = $percentage;
		$this->value = $value;
	}

	public function getType() : string{
		return $this->type;
	}

	public function getPercentage() : int{
		return $this->percentage;
	}

	public function getValue() : int{
		return $this->value;
	}
}
