<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\user;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexUser implements TebexResponse{

	/**
	 * @param TebexPlayer $player
	 * @param int $ban_count
	 * @param int $chargeback_rate
	 * @param TebexPayment[] $payments
	 * @param TebexPurchaseTotals $purchase_totals
	 */
	public function __construct(
		readonly public TebexPlayer $player,
		readonly public int $ban_count,
		readonly public int $chargeback_rate,
		readonly public array $payments,
		readonly public TebexPurchaseTotals $purchase_totals
	){}
}