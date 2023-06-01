<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\information;

final class TebexServerInformation{

	public function __construct(
		readonly public int $id,
		readonly public string $name
	){}
}