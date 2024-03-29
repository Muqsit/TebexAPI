<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\listing;

use muqsit\tebexapi\connection\request\TebexGetRequest;
use muqsit\tebexapi\connection\response\TebexResponse;
use muqsit\tebexapi\utils\TebexGuiItem;

/**
 * @extends TebexGetRequest<TebexListingInfo>
 */
final class TebexListingRequest extends TebexGetRequest{

	public function getEndpoint() : string{
		return "/listing";
	}


	public function getExpectedResponseCode() : int{
		return 200;
	}

	/**
	 * @param array<string, mixed> $response
	 * @return TebexResponse
	 */
	public function createResponse(array $response) : TebexResponse{
		/**
		 * @var array{
		 * 		categories: array<array{
		 * 			packages: array<string, mixed>,
		 * 			subcategories: array<array{packages: array<string, mixed>, id: int, order: int, name: string, gui_item: string|int}>,
		 * 			id: int,
		 * 			order: int,
		 * 			name: string,
		 * 			gui_item: string|int,
		 * 			only_subcategories: bool
		 * 		}>
		 * } $response
		 */

		$categories = [];
		foreach($response["categories"] as $entry){
			$packages = [];
			/** @var array<string, mixed> $package */
			foreach($entry["packages"] as $package){
				$packages[] = TebexPackage::fromTebexData($package);
			}

			$subcategories = [];
			foreach($entry["subcategories"] as $subcategory){
				$subcategory_packages = [];
				/** @var array<string, mixed> $package */
				foreach($subcategory["packages"] as $package){
					$subcategory_packages[] = TebexPackage::fromTebexData($package);
				}

				$subcategories[] = new TebexSubCategory(
					$subcategory["id"],
					$subcategory["order"],
					$subcategory["name"],
					$subcategory_packages,
					new TebexGuiItem((string) $subcategory["gui_item"])
				);
			}

			$categories[] = new TebexCategory(
				$entry["id"],
				$entry["order"],
				$entry["name"],
				$packages,
				new TebexGuiItem((string) $entry["gui_item"]),
				$entry["only_subcategories"],
				$subcategories
			);
		}

		return new TebexListingInfo($categories);
	}
}