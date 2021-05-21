<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands\offline;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexQueuedOfflineCommandsInfo implements TebexResponse{

	private TebexQueuedOfflineCommandsMeta $meta;

	/** @var TebexQueuedOfflineCommand[] */
	private array $commands;

	/**
	 * @param TebexQueuedOfflineCommandsMeta $meta
	 * @param TebexQueuedOfflineCommand[] $commands
	 */
	public function __construct(TebexQueuedOfflineCommandsMeta $meta, array $commands){
		$this->meta = $meta;
		$this->commands = $commands;
	}

	public function getMeta() : TebexQueuedOfflineCommandsMeta{
		return $this->meta;
	}

	/**
	 * @return TebexQueuedOfflineCommand[]
	 */
	public function getCommands() : array{
		return $this->commands;
	}
}