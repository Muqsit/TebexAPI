<?php

declare(strict_types=1);

namespace muqsit\tebexapi\utils\time;

use InvalidArgumentException;

final class TebexTime{

	public static function create(int $value, string $unit) : self{
		$time_unit = TebexTimeUnitManager::get($unit);
		if($time_unit === null){
			throw new InvalidArgumentException("Invalid time unit: {$unit}");
		}
		return new self($value, $time_unit);
	}

	public function __construct(
		readonly public int $value,
		readonly public TebexTimeUnit $unit
	){}

	public function toSeconds() : int{
		return $this->unit->toSeconds($this->value);
	}
}
