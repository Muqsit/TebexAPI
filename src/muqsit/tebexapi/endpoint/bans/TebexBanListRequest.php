<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\bans;

use muqsit\tebexapi\connection\request\TebexGetRequest;
use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @extends TebexGetRequest<TebexBanList>
 */
final class TebexBanListRequest extends TebexGetRequest{

	public function getEndpoint() : string{
		return "/bans";
	}

	public function getExpectedResponseCode() : int{
		return 200;
	}

	/**
	 * @param array{data: array} $response
	 * @return TebexResponse
	 */
	public function createResponse(array $response) : TebexResponse{
		$entries = [];
		foreach($response["data"] as $entry){
			$entries[] = TebexBanEntry::fromTebexResponse($entry);
		}
		return new TebexBanList($entries);
	}
}