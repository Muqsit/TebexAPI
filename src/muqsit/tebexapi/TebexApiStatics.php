<?php

declare(strict_types=1);

namespace muqsit\tebexapi;

use muqsit\tebexapi\utils\logger\IgnoredTebexLogger;
use muqsit\tebexapi\utils\logger\TebexLogger;

final class TebexApiStatics{

	public const ENDPOINT = "https://plugin.tebex.io";

	private static ?TebexLogger $logger = null;

	public static function getLogger() : TebexLogger{
		return self::$logger ??= self::setLogger(new IgnoredTebexLogger());
	}

	public static function setLogger(TebexLogger $logger) : TebexLogger{
		return self::$logger = $logger;
	}
}