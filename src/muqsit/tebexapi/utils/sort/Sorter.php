<?php

declare(strict_types=1);

namespace muqsit\tebexapi\utils\sort;

final class Sorter{

	/**
	 * @param Sortable[] $sortables
	 */
	public static function sort(array &$sortables) : void{
		uasort($sortables, static fn(Sortable $a, Sortable $b) : int => $a->getOrder() <=> $b->getOrder());
	}
}