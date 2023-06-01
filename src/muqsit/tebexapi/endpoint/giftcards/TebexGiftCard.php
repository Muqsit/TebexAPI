<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\giftcards;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexGiftCard implements TebexResponse{

	/**
	 * @param array<string, mixed> $response
	 * @return self
	 */
	public static function fromTebexResponse(array $response) : self{
		/** @var array{id: int, code: string, balance: array{starting: string, remaining: string, currency: string}, note: string, void: bool} $response */
		return new self($response["id"], $response["code"], new TebexGiftCardBalance($response["balance"]["starting"], $response["balance"]["remaining"], $response["balance"]["currency"]), $response["note"], $response["void"]);
	}

	public function __construct(
		readonly public int $id,
		readonly public string $code,
		readonly public TebexGiftCardBalance $balance,
		readonly public string $note,
		readonly public bool $void
	){}
}