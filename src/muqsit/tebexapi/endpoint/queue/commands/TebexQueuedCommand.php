<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands;

use muqsit\tebexapi\utils\TebexCommand;

abstract class TebexQueuedCommand{

	private int $id;
	private TebexCommand $command;
	private ?int $payment_id; // null if the command is initiated by a community goal
	private ?int $package_id; // null if the command is initiated by a community goal

	public function __construct(int $id, string $command, ?int $payment_id, ?int $package_id){
		$this->id = $id;
		$this->command = new TebexCommand($command);
		$this->payment_id = $payment_id;
		$this->package_id = $package_id;
	}

	final public function getId() : int{
		return $this->id;
	}

	final public function getCommand() : TebexCommand{
		return $this->command;
	}

	final public function getPaymentId() : ?int{
		return $this->payment_id;
	}

	final public function getPackageId() : ?int{
		return $this->package_id;
	}
}