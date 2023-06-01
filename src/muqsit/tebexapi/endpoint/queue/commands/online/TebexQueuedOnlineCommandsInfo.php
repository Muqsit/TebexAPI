<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands\online;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexQueuedOnlineCommandsInfo implements TebexResponse{

	/**
	 * @param TebexQueuedOnlineCommand[] $commands
	 */
	public function __construct(
		readonly public array $commands
	){}
}