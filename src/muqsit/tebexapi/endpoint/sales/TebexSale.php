<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\sales;

use muqsit\tebexapi\utils\TebexDiscountInfo;
use muqsit\tebexapi\utils\TebexEffectiveInfo;

final class TebexSale{

	public function __construct(
		readonly public int $id,
		readonly public TebexEffectiveInfo $effective,
		readonly public TebexDiscountInfo $discount,
		readonly public int $start,
		readonly public int $expire,
		readonly public int $order
	){}
}