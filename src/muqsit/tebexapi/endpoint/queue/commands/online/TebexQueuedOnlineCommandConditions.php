<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands\online;

use muqsit\tebexapi\endpoint\queue\commands\TebexQueuedCommandConditions;

final class TebexQueuedOnlineCommandConditions extends TebexQueuedCommandConditions{

	public function __construct(
		int $delay,
		readonly public int $slots
	){
		parent::__construct($delay);
	}
}