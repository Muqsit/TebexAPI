<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands\online;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexQueuedOnlineCommandsInfo implements TebexResponse{

	/** @var TebexQueuedOnlineCommand[] */
	private array $commands;

	/**
	 * @param TebexQueuedOnlineCommand[] $commands
	 */
	public function __construct(array $commands){
		$this->commands = $commands;
	}

	/**
	 * @return TebexQueuedOnlineCommand[]
	 */
	public function getCommands() : array{
		return $this->commands;
	}
}