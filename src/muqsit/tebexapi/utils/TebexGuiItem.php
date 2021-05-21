<?php

declare(strict_types=1);

namespace muqsit\tebexapi\utils;

final class TebexGuiItem{

	private string $value;

	public function __construct(string $value){
		$this->value = $value;
	}

	public function getValue() : string{
		return $this->value;
	}
}