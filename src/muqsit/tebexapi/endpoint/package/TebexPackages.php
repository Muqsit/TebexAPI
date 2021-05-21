<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\package;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexPackages implements TebexResponse{

	/** @var TebexPackage[] */
	private array $packages;

	/**
	 * @param TebexPackage[] $packages
	 */
	public function __construct(array $packages){
		$this->packages = $packages;
	}

	/**
	 * @return TebexPackage[]
	 */
	public function getAll() : array{
		return $this->packages;
	}
}