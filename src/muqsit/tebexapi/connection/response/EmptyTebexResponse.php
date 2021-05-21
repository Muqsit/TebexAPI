<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\response;

final class EmptyTebexResponse implements TebexResponse{

	public static function instance() : self{
		static $instance = null;
		return $instance ??= new self();
	}

	private function __construct(){
		// NOOP
	}
}