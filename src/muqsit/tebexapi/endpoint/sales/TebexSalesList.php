<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\sales;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexSalesList implements TebexResponse{

	/** @var TebexSale[] */
	private array $sales;

	/**
	 * @param TebexSale[] $sales
	 */
	public function __construct(array $sales){
		$this->sales = $sales;
	}

	/**
	 * @return TebexSale[]
	 */
	public function getAll() : array{
		return $this->sales;
	}
}