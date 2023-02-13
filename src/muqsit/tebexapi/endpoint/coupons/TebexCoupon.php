<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\coupons;

use muqsit\tebexapi\connection\response\TebexResponse;
use muqsit\tebexapi\utils\TebexDiscountInfo;
use muqsit\tebexapi\utils\TebexEffectiveInfo;

final class TebexCoupon implements TebexResponse{

	/**
	 * @param array<string, mixed> $response
	 * @return self
	 */
	public static function fromTebexResponse(array $response) : self{
		/**
		 * @var array{
		 * 		id: int,
		 * 		code: string,
		 * 		effective: array<string, mixed>,
		 * 		discount: array<string, mixed>,
		 * 		expire: array<string, mixed>,
		 * 		basket_type: string,
		 * 		start_date: string,
		 * 		user_limit: int,
		 * 		minimum: int,
		 * 		username: string,
		 * 		note: string
		 * } $response
		 */

		return new self(
			$response["id"],
			$response["code"],
			TebexEffectiveInfo::fromTebexResponse($response["effective"]),
			TebexDiscountInfo::fromTebexResponse($response["discount"]),
			TebexCouponExpireInfo::fromTebexResponse($response["expire"]),
			$response["basket_type"],
			(int) strtotime($response["start_date"]),
			$response["user_limit"],
			$response["minimum"],
			$response["username"] !== "" ? $response["username"] : null,
			$response["note"]
		);
	}

	public function __construct(
		/** @readonly */ public int $id,
		/** @readonly */ public string $code,
		/** @readonly */ public TebexEffectiveInfo $effective,
		/** @readonly */ public TebexDiscountInfo $discount,
		/** @readonly */ public TebexCouponExpireInfo $expire,
		/** @readonly */ public string $basket_type,
		/** @readonly */ public int $start_date,
		/** @readonly */ public int $user_limit,
		/** @readonly */ public int $minimum,
		/** @readonly */ public ?string $username,
		/** @readonly */ public string $note
	){}
}