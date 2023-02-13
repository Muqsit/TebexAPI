<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\package;

use muqsit\tebexapi\connection\response\TebexResponse;
use muqsit\tebexapi\utils\TebexGuiItem;
use muqsit\tebexapi\utils\time\TebexTime;

final class TebexPackage implements TebexResponse{

	/**
	 * @param array<string, mixed> $data
	 * @return self
	 */
	public static function fromTebexResponse(array $data) : self{
		/**
		 * @var array{
		 * 		category: array{id: int, name: string},
		 * 		servers: array{id: int, name: string},
		 * 		id: int,
		 * 		name: string,
		 * 		image: string|false,
		 * 		price: float,
		 * 		expiry_length: int,
		 * 		expiry_period: string,
		 * 		type: string,
		 * 		global_limit: int,
		 * 		global_limit_period: string,
		 * 		user_limit: int,
		 * 		user_limit_period: string,
		 * 		required_packages: int[],
		 * 		require_any: bool,
		 * 		create_giftcard: bool,
		 * 		show_until: int|false,
		 * 		gui_item: string,
		 * 		disabled: bool,
		 * 		disable_quantity: bool,
		 * 		custom_price: bool,
		 * 		choose_server: bool,
		 * 		limit_expires: bool,
		 * 		inherit_commands: bool,
		 * 		variable_giftcard: bool
		 * } $data
		 */

		$servers = [];
		foreach($data["servers"] as ["id" => $id, "name" => $name]){
			$servers[] = new TebexPackageServer($id, $name);
		}

		$category = $data["category"];
		return new self(
			$data["id"],
			$data["name"],
			$data["image"] !== false ? $data["image"] : null,
			$data["price"],
			TebexTime::create($data["expiry_length"], $data["expiry_period"]),
			$data["type"],
			new TebexPackageCategory($category["id"], $category["name"]),
			TebexTime::create($data["global_limit"], $data["global_limit_period"]),
			TebexTime::create($data["user_limit"], $data["user_limit_period"]),
			$servers,
			$data["required_packages"],
			$data["require_any"],
			$data["create_giftcard"],
			$data["show_until"] !== false ? $data["show_until"] : null,
			new TebexGuiItem($data["gui_item"]),
			$data["disabled"],
			$data["disable_quantity"],
			$data["custom_price"],
			$data["choose_server"],
			$data["limit_expires"],
			$data["inherit_commands"],
			$data["variable_giftcard"]
		);
	}

	/**
	 * @param int $id
	 * @param string $name
	 * @param string|null $image
	 * @param float $price
	 * @param TebexTime $expiry
	 * @param string $type
	 * @param TebexPackageCategory $category
	 * @param TebexTime $global_limit
	 * @param TebexTime $user_limit
	 * @param TebexPackageServer[] $servers
	 * @param int[] $required_package_ids
	 * @param bool $require_any
	 * @param bool $create_giftcard
	 * @param int|null $show_until
	 * @param TebexGuiItem $gui_item
	 * @param bool $disabled
	 * @param bool $disabled_quantity
	 * @param bool $custom_price
	 * @param bool $choose_server
	 * @param bool $limit_expires
	 * @param bool $inherit_commands
	 * @param bool $variable_giftcard
	 */
	public function __construct(
		/** @readonly */ public int $id,
		/** @readonly */ public string $name,
		/** @readonly */ public ?string $image,
		/** @readonly */ public float $price,
		/** @readonly */ public TebexTime $expiry,
		/** @readonly */ public string $type,
		/** @readonly */ public TebexPackageCategory $category,
		/** @readonly */ public TebexTime $global_limit,
		/** @readonly */ public TebexTime $user_limit,
		/** @readonly */ public array $servers,
		/** @readonly */ public array $required_package_ids,
		/** @readonly */ public bool $require_any,
		/** @readonly */ public bool $create_giftcard,
		/** @readonly */ public ?int $show_until,
		/** @readonly */ public TebexGuiItem $gui_item,
		/** @readonly */ public bool $disabled,
		/** @readonly */ public bool $disabled_quantity,
		/** @readonly */ public bool $custom_price,
		/** @readonly */ public bool $choose_server,
		/** @readonly */ public bool $limit_expires,
		/** @readonly */ public bool $inherit_commands,
		/** @readonly */ public bool $variable_giftcard
	){}
}