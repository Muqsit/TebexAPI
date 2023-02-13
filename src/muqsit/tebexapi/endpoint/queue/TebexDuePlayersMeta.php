<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue;

final class TebexDuePlayersMeta{

	public function __construct(
		/** @readonly */ public bool $execute_offline,
		/** @readonly */ public int $next_check,
		/** @readonly */ public bool $more
	){}
}