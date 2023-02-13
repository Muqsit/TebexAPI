<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\bans;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexBanList implements TebexResponse{

	/**
	 * @param TebexBanEntry[] $entries
	 */
	public function __construct(
		/** @readonly */ public array $entries
	){}
}