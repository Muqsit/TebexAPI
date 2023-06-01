<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\sales;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexSalesList implements TebexResponse{

	/**
	 * @param TebexSale[] $sales
	 */
	public function __construct(
		readonly public array $sales
	){}
}