<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\giftcards;

final class TebexGiftCardBalance{

	private string $starting;
	private string $remaining;
	private string $currency;

	public function __construct(string $starting, string $remaining, string $currency){
		$this->starting = $starting;
		$this->remaining = $remaining;
		$this->currency = $currency;
	}

	public function getStarting() : string{
		return $this->starting;
	}

	public function getRemaining() : string{
		return $this->remaining;
	}

	public function getCurrency() : string{
		return $this->currency;
	}
}