<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\giftcards;

final class TebexGiftCardBalance{

	public function __construct(
		/** @readonly */ public string $starting,
		/** @readonly */ public string $remaining,
		/** @readonly */ public string $currency
	){}
}