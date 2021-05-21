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
		 * @phpstan-var array{
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

	private int $id;
	private string $time;
	private string $ip;
	private string $payment_email;
	private string $reason;
	private ?TebexBanEntryUser $user;

	public function __construct(int $id, string $time, string $ip, string $payment_email, string $reason, ?TebexBanEntryUser $user){
		$this->id = $id;
		$this->time = $time;
		$this->ip = $ip;
		$this->payment_email = $payment_email;
		$this->reason = $reason;
		$this->user = $user;
	}

	public function getId() : int{
		return $this->id;
	}

	public function getTime() : string{
		return $this->time;
	}

	public function getIp() : string{
		return $this->ip;
	}

	public function getPaymentEmail() : string{
		return $this->payment_email;
	}

	public function getReason() : string{
		return $this->reason;
	}

	public function getUser() : ?TebexBanEntryUser{
		return $this->user;
	}
}