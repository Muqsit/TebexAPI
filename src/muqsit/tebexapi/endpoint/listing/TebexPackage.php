<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\listing;

use muqsit\tebexapi\utils\sort\Sortable;
use muqsit\tebexapi\utils\TebexGuiItem;

final class TebexPackage implements Sortable{

	/**
	 * @param array{
	 * 		id: int,
	 * 		order: int,
	 * 		name: string,
	 * 		price: string,
	 * 		sale: array{active: bool, discount: string},
	 * 		image: string|false,
	 * 		gui_item: string|int
	 * } $response
	 * @return self
	 */
	public static function fromTebexData(array $response) : self{
		return new self(
			$response["id"],
			$response["order"],
			$response["name"],
			$response["price"],
			new TebexPackageSaleInfo(
				$response["sale"]["active"],
				(string) $response["sale"]["discount"]
			),
			$response["image"] !== false ? $response["image"] : null,
			new TebexGuiItem((string) $response["gui_item"])
		);
	}

	public function __construct(
		readonly public int $id,
		readonly public int $order,
		readonly public string $name,
		readonly public string $price,
		readonly public TebexPackageSaleInfo $sale,
		readonly public ?string $image,
		readonly public TebexGuiItem $gui_item
	){}

	public function getOrder() : int{
		return $this->order;
	}
}