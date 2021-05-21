<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands;

abstract class TebexQueuedCommandConditions{

	private int $delay;

	public function __construct(int $delay){
		$this->delay = $delay;
	}

	final public function getDelay() : int{
		return $this->delay;
	}
}