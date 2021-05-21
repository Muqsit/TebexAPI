<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\package;

use muqsit\tebexapi\connection\request\TebexGetRequest;
use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @phpstan-extends TebexGetRequest<TebexPackages>
 */
final class TebexPackagesRequest extends TebexGetRequest{

	public function getEndpoint() : string{
		return "/packages";
	}

	public function getExpectedResponseCode() : int{
		return 200;
	}

	/**
	 * @param array<string, mixed>[] $response
	 * @return TebexResponse
	 */
	public function createResponse(array $response) : TebexResponse{
		$packages = [];
		foreach($response as $package_response){
			$packages[] = TebexPackage::fromTebexResponse($package_response);
		}
		return new TebexPackages($packages);
	}
}