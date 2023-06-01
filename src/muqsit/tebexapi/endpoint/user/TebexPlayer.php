<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\user;

final class TebexPlayer{

	public function __construct(
		readonly public string $id,
		readonly public string $created_at,
		readonly public string $updated_at,
		readonly public string $cache_expire,
		readonly public string $username,
		readonly public string $meta,
		readonly public int $plugin_username_id
	){}
}