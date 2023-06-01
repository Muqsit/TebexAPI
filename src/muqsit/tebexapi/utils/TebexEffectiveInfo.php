<?php

declare(strict_types=1);

namespace muqsit\tebexapi\utils;

final class TebexEffectiveInfo{

	/**
	 * @param array<string, mixed> $response
	 * @return self
	 */
	public static function fromTebexResponse(array $response) : self{
		/** @var array{type: string, packages: int[], categories: int[]} $response */
		return new self(
			$response["type"],
			$response["packages"],
			$response["categories"]
		);
	}

	/**
	 * @param string $type
	 * @param int[] $package_ids
	 * @param int[] $category_ids
	 */
	public function __construct(
		readonly public string $type,
		readonly public array $package_ids,
		readonly public array $category_ids
	){}
}