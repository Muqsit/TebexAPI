<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands\online;

use muqsit\tebexapi\endpoint\queue\commands\TebexQueuedCommandConditions;

final class TebexQueuedOnlineCommandConditions extends TebexQueuedCommandConditions{

	private int $slots;

	public function __construct(int $delay, int $slots){
		parent::__construct($delay);
		$this->slots = $slots;
	}

	public function getInventorySlots() : int{
		return $this->slots;
	}
}