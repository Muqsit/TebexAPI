<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\listing;

use muqsit\tebexapi\utils\TebexGuiItem;

final class TebexCategory extends BaseTebexCategory{

	/**
	 * @param int $id
	 * @param int $order
	 * @param string $name
	 * @param TebexPackage[] $packages
	 * @param TebexGuiItem $gui_item
	 * @param bool $only_subcategories
	 * @param TebexSubCategory[] $subcategories
	 */
	public function __construct(
		int $id,
		int $order,
		string $name,
		array $packages,
		TebexGuiItem $gui_item,
		/** @readonly */ public bool $only_subcategories,
		/** @readonly */ public array $subcategories
	){
		parent::__construct($id, $order, $name, $packages, $gui_item);
	}
}