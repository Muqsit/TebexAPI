<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\package;

final class TebexPackageServer{

	public function __construct(
		readonly public int $id,
		readonly public string $name
	){}
}