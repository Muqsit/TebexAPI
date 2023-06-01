<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\listing;

use muqsit\tebexapi\utils\sort\Sortable;
use muqsit\tebexapi\utils\TebexGuiItem;

abstract class BaseTebexCategory implements Sortable{

	/**
	 * @param int $id
	 * @param int $order
	 * @param string $name
	 * @param TebexPackage[] $packages
	 * @param TebexGuiItem $gui_item
	 */
	public function __construct(
		readonly public int $id,
		readonly public int $order,
		readonly public string $name,
		readonly public array $packages,
		readonly public TebexGuiItem $gui_item
	){}

	final public function getOrder() : int{
		return $this->order;
	}
}