<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\coupons;

final class TebexCouponsListPagination{

	/**
	 * @param array<string, mixed> $response
	 * @return self
	 */
	public static function fromTebexResponse(array $response) : self{
		/**
		 * @var array{
		 * 		totalResults: int,
		 * 		currentPage: int,
		 * 		lastPage: int,
		 * 		previous: ?int,
		 * 		next: ?string
		 * } $response
		 */

		return new self($response["totalResults"], $response["currentPage"], $response["lastPage"], $response["previous"], $response["next"]);
	}

	public function __construct(
		/** @readonly */ public int $total,
		/** @readonly */ public int $current_page,
		/** @readonly */ public int $last_page,
		/** @readonly */ public ?int $previous,
		/** @readonly */ public ?string $next_url
	){}
}