<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\giftcards;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexGiftCardsList implements TebexResponse{

	/**
	 * @param array<array<string, mixed>> $response
	 * @return self
	 */
	public static function fromTebexResponse(array $response) : self{
		$gift_cards = [];
		foreach($response as $gift_card_data){
			$gift_card = TebexGiftCard::fromTebexResponse($gift_card_data);
			$gift_cards[$gift_card->id] = $gift_card;
		}
		return new self($gift_cards);
	}

	/**
	 * @param array<int, TebexGiftCard> $gift_cards
	 */
	public function __construct(
		/** @readonly */ public array $gift_cards
	){}

	public function getGiftCard(int $id) : ?TebexGiftCard{
		return $this->gift_cards[$id] ?? null;
	}
}