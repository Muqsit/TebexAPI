<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\user;

final class TebexPurchaseTotals{

	/**
	 * @param array<string, float> $purchase_totals
	 */
	public function __construct(
		/** @readonly */ public array $purchase_totals
	){}

	public function get(string $currency) : ?float{
		return $this->purchase_totals[$currency] ?? null;
	}
}