<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexDuePlayersInfo implements TebexResponse{

	/**
	 * @param TebexDuePlayersMeta $meta
	 * @param TebexDuePlayer[] $players
	 */
	public function __construct(
		readonly public TebexDuePlayersMeta $meta,
		readonly public array $players
	){}
}