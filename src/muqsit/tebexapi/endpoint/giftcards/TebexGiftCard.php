<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\giftcards;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexGiftCard implements TebexResponse{

	/**
	 * @param mixed[] $response
	 * @return self
	 *
	 * @phpstan-param array<string, mixed> $response
	 */
	public static function fromTebexResponse(array $response) : self{
		/** @phpstan-var array{id: int, code: string, balance: array{starting: string, remaining: string, currency: string}, note: string, void: bool} $response */
		return new self($response["id"], $response["code"], new TebexGiftCardBalance($response["balance"]["starting"], $response["balance"]["remaining"], $response["balance"]["currency"]), $response["note"], $response["void"]);
	}

	private int $id;
	private string $code;
	private TebexGiftCardBalance $balance;
	private string $note;
	private bool $void;

	public function __construct(int $id, string $code, TebexGiftCardBalance $balance, string $note, bool $void){
		$this->id = $id;
		$this->code = $code;
		$this->balance = $balance;
		$this->note = $note;
		$this->void = $void;
	}

	public function getId() : int{
		return $this->id;
	}

	public function getCode() : string{
		return $this->code;
	}

	public function getBalance() : TebexGiftCardBalance{
		return $this->balance;
	}

	public function getNote() : string{
		return $this->note;
	}

	public function isVoid() : bool{
		return $this->void;
	}
}