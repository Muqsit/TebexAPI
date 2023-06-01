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

	public function __construct(
		readonly public string $type,
		readonly public int $percentage,
		readonly public int $value
	){}
}
