<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue\commands\offline;

use muqsit\tebexapi\connection\request\TebexGetRequest;
use muqsit\tebexapi\connection\response\TebexResponse;
use muqsit\tebexapi\endpoint\queue\TebexDuePlayer;
use muqsit\tebexapi\utils\TebexCommand;

/**
 * @extends TebexGetRequest<TebexQueuedOfflineCommandsInfo>
 */
final class TebexQueuedOfflineCommandsListRequest extends TebexGetRequest{

	public function getEndpoint() : string{
		return "/queue/offline-commands";
	}

	public function getExpectedResponseCode() : int{
		return 200;
	}

	/**
	 * @param array{
	 * 		commands: array<array{
	 * 			id: int,
	 * 			player: array<string, mixed>,
	 * 			command: string,
	 * 			payment: int,
	 * 			package: int,
	 * 			conditions: array{delay: int}
	 * 		}>,
	 * 		meta: array{limited: bool}
	 * } $response
	 * @return TebexResponse
	 */
	public function createResponse(array $response) : TebexResponse{
		$commands = [];
		foreach($response["commands"] as $cmd){
			$commands[] = new TebexQueuedOfflineCommand(
				$cmd["id"],
				new TebexCommand($cmd["command"]),
				$cmd["payment"],
				$cmd["package"],
				new TebexQueuedOfflineCommandConditions($cmd["conditions"]["delay"]),
				TebexDuePlayer::fromTebexResponse($cmd["player"])
			);
		}

		return new TebexQueuedOfflineCommandsInfo(
			new TebexQueuedOfflineCommandsMeta($response["meta"]["limited"]),
			$commands
		);
	}
}