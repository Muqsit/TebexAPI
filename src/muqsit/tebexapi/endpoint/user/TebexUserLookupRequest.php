<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\user;

use muqsit\tebexapi\connection\request\TebexGetRequest;
use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @extends TebexGetRequest<TebexUser>
 */
final class TebexUserLookupRequest extends TebexGetRequest{

	private string $username_or_uuid;

	public function __construct(string $username_or_uuid){
		$this->username_or_uuid = $username_or_uuid;
	}

	public function getEndpoint() : string{
		return "/user/{$this->username_or_uuid}";
	}

	public function getExpectedResponseCode() : int{
		return 200;
	}

	/**
	 * @param array{
	 * 		payments: array<array{txn_id: string, time: int, price: float, currency: string, status: int}>,
	 * 		player: array{
	 * 			id: string,
	 * 			created_at: string,
	 * 			updated_at: string,
	 * 			cache_expire: string,
	 * 			username: string,
	 * 			meta: string,
	 * 			plugin_username_id: int
	 * 		},
	 * 		banCount: int,
	 * 		chargebackRate: int,
	 * 		purchaseTotals: array<string, float>
	 * } $response
	 * @return TebexResponse
	 */
	public function createResponse(array $response) : TebexResponse{
		$payments = [];
		foreach($response["payments"] as $payment){
			$payments[] = new TebexPayment($payment["txn_id"], $payment["time"], $payment["price"], $payment["currency"], $payment["status"]);
		}

		$player = $response["player"];

		return new TebexUser(
			new TebexPlayer(
				$player["id"],
				$player["created_at"],
				$player["updated_at"],
				$player["cache_expire"],
				$player["username"],
				$player["meta"],
				$player["plugin_username_id"]
			),
			$response["banCount"],
			$response["chargebackRate"],
			$payments,
			new TebexPurchaseTotals($response["purchaseTotals"])
		);
	}
}