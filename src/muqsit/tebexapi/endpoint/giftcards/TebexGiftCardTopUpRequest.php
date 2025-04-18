<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\giftcards;

use muqsit\tebexapi\connection\request\TebexPutRequest;
use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @extends TebexPutRequest<TebexGiftCard>
 */
final class TebexGiftCardTopUpRequest extends TebexPutRequest{

	private int $id;
	private string $amount;

	public function __construct(int $id, string $amount){
		$this->id = $id;
		$this->amount = $amount;
	}

	public function getEndpoint() : string{
		return "/gift-cards";
	}

	public function getExpectedResponseCode() : int{
		return 200;
	}

	/**
	 * @param array{data: array<string, mixed>} $response
	 * @return TebexResponse
	 */
	public function createResponse(array $response) : TebexResponse{
		return TebexGiftCard::fromTebexResponse($response["data"]);
	}

	protected function getPOSTFields() : string{
		return http_build_query([
			"id" => $this->id,
			"amount" => $this->amount
		]);
	}
}