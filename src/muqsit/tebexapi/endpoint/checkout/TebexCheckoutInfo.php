<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\checkout;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexCheckoutInfo implements TebexResponse{

	private string $url;
	private string $expires;

	public function __construct(string $url, string $expires){
		$this->url = $url;
		$this->expires = $expires;
	}

	public function getUrl() : string{
		return $this->url;
	}

	public function getExpires() : string{
		return $this->expires;
	}
}