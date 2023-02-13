<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\coupons;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexCouponsList implements TebexResponse{

	/**
	 * @param  array{data: array<array<string, mixed>>} $response
	 * @return self
	 */
	public static function fromTebexResponse(array $response) : self{
		/**
		 * @var array{
		 * 		pagination: array<string, mixed>,
		 * 		data: array<array<string, mixed>>
		 * } $response
		 */

		$coupons = [];
		foreach($response["data"] as $coupon_data){
			$coupon = TebexCoupon::fromTebexResponse($coupon_data);
			$coupons[$coupon->id] = $coupon;
		}
		return new self(TebexCouponsListPagination::fromTebexResponse($response["pagination"]), $coupons);
	}

	/**
	 * @param TebexCouponsListPagination $pagination
	 * @param TebexCoupon[] $coupons
	 */
	public function __construct(
		/** @readonly */ public TebexCouponsListPagination $pagination,
		/** @readonly */ public array $coupons
	){}

	public function getCoupon(int $id) : ?TebexCoupon{
		return $this->coupons[$id] ?? null;
	}
}