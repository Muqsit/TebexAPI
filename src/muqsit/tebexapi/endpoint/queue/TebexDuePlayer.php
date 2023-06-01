<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\queue;

final class TebexDuePlayer{

	/**
	 * @param array<string, mixed> $data
	 * @return self
	 */
	public static function fromTebexResponse(array $data) : self{
		/** @var array{id: string|int, name: string, uuid: string} $data */
		return new self((int) $data["id"], $data["name"], $data["uuid"]);
	}

	public function __construct(
		readonly public int $id,
		readonly public string $name,
		readonly public ?string $uuid
	){}
}