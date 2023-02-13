<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands\offline;

use muqsit\tebexapi\endpoint\queue\commands\TebexQueuedCommand;
use muqsit\tebexapi\endpoint\queue\TebexDuePlayer;
use muqsit\tebexapi\utils\TebexCommand;

final class TebexQueuedOfflineCommand extends TebexQueuedCommand{

	public function __construct(
		int $id,
		TebexCommand $command,
		?int $payment_id,
		?int $package_id,
		/** @readonly */ public TebexQueuedOfflineCommandConditions $conditions,
		/** @readonly */ public TebexDuePlayer $player
	){
		parent::__construct($id, $command, $payment_id, $package_id);
	}
}