<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\coupons;

final class TebexCouponExpireInfo{

	/**
	 * @param array<string, mixed> $response
	 * @return self
	 */
	public static function fromTebexResponse(array $response) : self{
		/**
		 * @var array{
		 * 		redeem_unlimited: string,
		 * 		expire_never: string,
		 * 		limit: int,
		 * 		date: string
		 * } $response
		 */

		return new self(
			(bool) $response["redeem_unlimited"],
			(bool) $response["expire_never"],
			$response["limit"],
			(int) strtotime($response["date"])
		);
	}

	public function __construct(
		/** @readonly */ public bool $redeem_unlimited,
		/** @readonly */ public bool $expire_never,
		/** @readonly */ public int $limit,
		/** @readonly */ public int $date
	){}
}