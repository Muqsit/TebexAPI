<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue;

use muqsit\tebexapi\connection\request\TebexGetRequest;
use muqsit\tebexapi\connection\response\TebexResponse;

/**
 * @extends TebexGetRequest<TebexDuePlayersInfo>
 */
final class TebexDuePlayersListRequest extends TebexGetRequest{

	public function getEndpoint() : string{
		return "/queue";
	}

	public function getExpectedResponseCode() : int{
		return 200;
	}

	/**
	 * @param array{
	 * 		meta: array{execute_offline: bool, next_check: int, more: bool},
	 * 		players: array<array<string, mixed>>
	 * } $response
	 * @return TebexResponse
	 */
	public function createResponse(array $response) : TebexResponse{
		["meta" => $meta, "players" => $players_list] = $response;

		$players = [];
		foreach($players_list as $player){
			$players[] = TebexDuePlayer::fromTebexResponse($player);
		}

		return new TebexDuePlayersInfo(
			new TebexDuePlayersMeta(
				$meta["execute_offline"],
				$meta["next_check"],
				$meta["more"]
			),
			$players
		);
	}
}