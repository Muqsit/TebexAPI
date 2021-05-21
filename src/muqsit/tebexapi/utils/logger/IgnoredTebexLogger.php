<?php

declare(strict_types=1);

namespace muqsit\tebexapi\utils\logger;

use Throwable;

final class IgnoredTebexLogger implements TebexLogger{

	public function exception(Throwable $t) : void{
		// ignored
	}
}