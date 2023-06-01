<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\package;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexPackages implements TebexResponse{

	/**
	 * @param TebexPackage[] $packages
	 */
	public function __construct(
		readonly public array $packages
	){}
}