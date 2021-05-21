<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\information;

use muqsit\tebexapi\connection\response\TebexResponse;

final class TebexInformation implements TebexResponse{

	private TebexAccountInformation $account;
	private TebexServerInformation $server;

	public function __construct(TebexAccountInformation $account, TebexServerInformation $server){
		$this->account = $account;
		$this->server = $server;
	}

	public function getAccount() : TebexAccountInformation{
		return $this->account;
	}

	public function getServer() : TebexServerInformation{
		return $this->server;
	}
}