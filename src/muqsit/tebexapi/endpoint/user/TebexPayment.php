<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\user;

final class TebexPayment{

	public function __construct(
		/** @readonly */ public string $transaction_id,
		/** @readonly */ public int $time,
		/** @readonly */ public float $price,
		/** @readonly */ public string $currency,
		/** @readonly */ public int $status
	){}
}