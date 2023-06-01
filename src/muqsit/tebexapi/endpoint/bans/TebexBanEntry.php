<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\bans;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexBanEntry implements TebexResponse{

	/**
	 * @param array<string, mixed> $response
	 * @return self
	 */
	public static function fromTebexResponse(array $response) : self{
		/**
		 * @var array{
		 * 		user : ?array{ign: string, uuid: string},
		 * 		id: int,
		 * 		time: string,
		 * 		ip: string,
		 * 		payment_email: string,
		 * 		reason: string
		 * } $response
		 */

		return new TebexBanEntry(
			$response["id"],
			$response["time"],
			$response["ip"],
			$response["payment_email"],
			$response["reason"],
			isset($response["user"]) ? new TebexBanEntryUser(
				$response["user"]["ign"],
				$response["user"]["uuid"]
			) : null
		);
	}

	public function __construct(
		readonly public int $id,
		readonly public string $time,
		readonly public string $ip,
		readonly public string $payment_email,
		readonly public string $reason,
		readonly public ?TebexBanEntryUser $user
	){}
}