<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\information;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexInformation implements TebexResponse{

	public function __construct(
		readonly public TebexAccountInformation $account,
		readonly public TebexServerInformation $server
	){}
}