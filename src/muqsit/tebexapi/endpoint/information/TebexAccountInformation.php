<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\information;

final class TebexAccountInformation{

	public function __construct(
		/** @readonly */ public int $id,
		/** @readonly */ public string $domain,
		/** @readonly */ public string $name,
		/** @readonly */ public TebexAccountCurrencyInformation $currency,
		/** @readonly */ public bool $online_mode,
		/** @readonly */ public string $game_type,
		/** @readonly */ public bool $log_events
	){}
}