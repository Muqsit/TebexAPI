<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\bans;

final class TebexBanEntryUser{

	public function __construct(
		readonly public string $username,
		readonly public string $uuid
	){}
}