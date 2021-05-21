<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\user;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexUser implements TebexResponse{

	private TebexPlayer $player;
	private int $ban_count;
	private int $chargeback_rate;

	/** @var TebexPayment[] */
	private array $payments;

	private TebexPurchaseTotals $purchase_totals;

	/**
	 * @param TebexPlayer $player
	 * @param int $ban_count
	 * @param int $chargeback_rate
	 * @param TebexPayment[] $payments
	 * @param TebexPurchaseTotals $purchase_totals
	 */
	public function __construct(TebexPlayer $player, int $ban_count, int $chargeback_rate, array $payments, TebexPurchaseTotals $purchase_totals){
		$this->player = $player;
		$this->ban_count = $ban_count;
		$this->chargeback_rate = $chargeback_rate;
		$this->payments = $payments;
		$this->purchase_totals = $purchase_totals;
	}

	public function getPlayer() : TebexPlayer{
		return $this->player;
	}

	public function getBanCount() : int{
		return $this->ban_count;
	}

	public function getChargebackRate() : int{
		return $this->chargeback_rate;
	}

	/**
	 * @return TebexPayment[]
	 */
	public function getPayments() : array{
		return $this->payments;
	}

	public function getPurchaseTotals() : TebexPurchaseTotals{
		return $this->purchase_totals;
	}
}