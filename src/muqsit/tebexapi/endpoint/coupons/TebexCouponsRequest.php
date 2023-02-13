<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\coupons;

use muqsit\tebexapi\connection\request\TebexGetRequest;
use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @extends TebexGetRequest<TebexCouponsList>
 */
final class TebexCouponsRequest extends TebexGetRequest{

	public function getEndpoint() : string{
		return "/coupons";
	}

	public function getExpectedResponseCode() : int{
		return 200;
	}

	/**
	 * @param array{data: array<string, mixed>} $response
	 * @return TebexResponse
	 */
	public function createResponse(array $response) : TebexResponse{
		return TebexCouponsList::fromTebexResponse($response);
	}
}