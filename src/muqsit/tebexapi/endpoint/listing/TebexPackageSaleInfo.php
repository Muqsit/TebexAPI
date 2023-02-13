<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\listing;

final class TebexPackageSaleInfo{

	public function __construct(
		/** @readonly */ public bool $active,
		/** @readonly */ public string $discount
	){}

	public function getPostDiscountPrice(string $price) : string{
		return $this->active ? sprintf("%0.2f", ((float) $price) - ((float) $this->discount)) : $price;
	}
}