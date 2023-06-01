<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\information;

final class TebexAccountCurrencyInformation{

	public function __construct(
		readonly public string $iso_4217,
		readonly public string $symbol
	){}
}