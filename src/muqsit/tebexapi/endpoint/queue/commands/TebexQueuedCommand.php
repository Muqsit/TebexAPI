<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands;

use muqsit\tebexapi\utils\TebexCommand;

abstract class TebexQueuedCommand{

	public function __construct(
		readonly public int $id,
		readonly public TebexCommand $command,
		readonly public ?int $payment_id, // null if the command is initiated by a community goal
		readonly public ?int $package_id  // null if the command is initiated by a community goal
	){}
}