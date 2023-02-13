<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands\offline;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexQueuedOfflineCommandsInfo implements TebexResponse{

	/**
	 * @param TebexQueuedOfflineCommandsMeta $meta
	 * @param TebexQueuedOfflineCommand[] $commands
	 */
	public function __construct(
		/** @readonly */ public TebexQueuedOfflineCommandsMeta $meta,
		/** @readonly */ public array $commands
	){}
}