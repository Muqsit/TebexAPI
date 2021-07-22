<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\giftcards;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexGiftCardsList implements TebexResponse{

	/**
	 * @param array<string, mixed> $response
	 * @return self
	 *
	 * @phpstan-param array<array<string, mixed>> $response
	 */
	public static function fromTebexResponse(array $response) : self{
		$gift_cards = [];
		foreach($response as $gift_card_data){
			$gift_card = TebexGiftCard::fromTebexResponse($gift_card_data);
			$gift_cards[$gift_card->getId()] = $gift_card;
		}
		return new self($gift_cards);
	}

	/** @var TebexGiftCard[] */
	private array $gift_cards;

	/**
	 * @param TebexGiftCard[] $gift_cards
	 *
	 * @phpstan-param array<int, TebexGiftCard> $gift_cards
	 */
	public function __construct(array $gift_cards){
		$this->gift_cards = $gift_cards;
	}

	public function getGiftCard(int $id) : ?TebexGiftCard{
		return $this->gift_cards[$id] ?? null;
	}

	/**
	 * @return TebexGiftCard[]
	 */
	public function getGiftCards() : array{
		return $this->gift_cards;
	}
}