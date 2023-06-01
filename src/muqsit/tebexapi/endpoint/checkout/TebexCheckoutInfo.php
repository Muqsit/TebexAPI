<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\checkout;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexCheckoutInfo implements TebexResponse{

	public function __construct(
		readonly public string $url,
		readonly public string $expires
	){}
}