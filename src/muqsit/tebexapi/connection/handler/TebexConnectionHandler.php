<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\handler;

use muqsit\tebexapi\connection\request\TebexRequestHolder;
use muqsit\tebexapi\connection\response\TebexResponse;
use muqsit\tebexapi\connection\response\TebexResponseHolder;
use muqsit\tebexapi\utils\TebexException;

interface TebexConnectionHandler{

	/**
	 * @param TebexRequestHolder $request_holder
	 * @param array<int, mixed> $default_curl_options
	 * @return TebexResponseHolder<TebexResponse>
	 * @throws TebexException
	 */
	public function handle(TebexRequestHolder $request_holder, array $default_curl_options) : TebexResponseHolder;
}