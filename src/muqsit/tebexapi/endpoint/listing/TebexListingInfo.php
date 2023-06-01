<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\listing;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexListingInfo implements TebexResponse{

	/**
	 * @param TebexCategory[] $categories
	 */
	public function __construct(
		readonly public array $categories
	){}
}