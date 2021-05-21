<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands\online;

use muqsit\tebexapi\endpoint\queue\commands\TebexQueuedCommand;

final class TebexQueuedOnlineCommand extends TebexQueuedCommand{

	private TebexQueuedOnlineCommandConditions $conditions;

	public function __construct(int $id, string $command, int $payment_id, int $package_id, TebexQueuedOnlineCommandConditions $conditions){
		parent::__construct($id, $command, $payment_id, $package_id);
		$this->conditions = $conditions;
	}

	public function getConditions() : TebexQueuedOnlineCommandConditions{
		return $this->conditions;
	}
}