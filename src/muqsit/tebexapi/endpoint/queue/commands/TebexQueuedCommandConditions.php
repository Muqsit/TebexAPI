<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands;

abstract class TebexQueuedCommandConditions{

	public function __construct(
		/** @readonly */ public int $delay
	){}
}