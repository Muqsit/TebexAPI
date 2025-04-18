<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\giftcards;

use muqsit\tebexapi\connection\request\TebexGetRequest;
use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @extends TebexGetRequest<TebexGiftCardsList>
 */
final class TebexGiftCardsRequest extends TebexGetRequest{

	public function __construct(){
	}

	public function getEndpoint() : string{
		return "/gift-cards";
	}

	public function getExpectedResponseCode() : int{
		return 200;
	}

	/**
	 * @param array{data: array<array<string, mixed>>} $response
	 * @return TebexResponse
	 */
	public function createResponse(array $response) : TebexResponse{
		return TebexGiftCardsList::fromTebexResponse($response["data"]);
	}
}