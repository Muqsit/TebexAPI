<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands\online;

use muqsit\tebexapi\endpoint\queue\commands\TebexQueuedCommand;
use muqsit\tebexapi\utils\TebexCommand;

final class TebexQueuedOnlineCommand extends TebexQueuedCommand{

	public function __construct(
		int $id,
		TebexCommand $command,
		?int $payment_id,
		?int $package_id,
		readonly public TebexQueuedOnlineCommandConditions $conditions
	){
		parent::__construct($id, $command, $payment_id, $package_id);
	}
}