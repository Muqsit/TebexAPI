<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\giftcards;

use muqsit\tebexapi\connection\request\TebexPostRequest;
use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @extends TebexPostRequest<TebexGiftCard>
 */
final class TebexGiftCardCreateRequest extends TebexPostRequest{

	private ?string $expires_at;
	private string $note;
	private string $amount;

	public function __construct(?string $expires_at, string $note, string $amount){
		$this->expires_at = $expires_at;
		$this->note = $note;
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
		return json_encode([
			"expires_at" => $this->expires_at,
			"note" => $this->note,
			"amount" => $this->amount
		], JSON_THROW_ON_ERROR);
	}
}