<?php

declare(strict_types=1);

namespace muqsit\tebexapi\utils\logger;

use Throwable;

interface TebexLogger{

	public function exception(Throwable $t) : void;
}