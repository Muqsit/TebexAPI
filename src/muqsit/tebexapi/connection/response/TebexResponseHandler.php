<?php

declare(strict_types=1);

namespace muqsit\tebexapi\connection\response;

use Closure;
use muqsit\tebexapi\TebexApiStatics;
use muqsit\tebexapi\utils\TebexException;

/**
 * @template TTebexResponse of TebexResponse
 */
final class TebexResponseHandler{

	/**
	 * @template UTebexResponse of TebexResponse
	 * @param class-string<UTebexResponse> $expected_response_class
	 * @return TebexResponseHandler<UTebexResponse>
	 */
	public static function debug(string $expected_response_class = TebexResponse::class) : self{
		/** @var Closure(UTebexResponse) : void $on_success */
		return self::onSuccess(var_dump(...));
	}

	/**
	 * @template UTebexResponse of TebexResponse
	 * @param Closure(UTebexResponse) : void $on_success
	 * @return TebexResponseHandler<UTebexResponse>
	 */
	public static function onSuccess(Closure $on_success) : self{
		return new self($on_success, TebexApiStatics::getLogger()->exception(...));
	}

	/** @var Closure(TTebexResponse) : void */
	public Closure $on_success;

	/** @var Closure(TebexException) : void */
	public Closure $on_failure;

	/**
	 * @param Closure(TTebexResponse) : void $on_success
	 * @param Closure(TebexException) : void $on_failure
	 */
	public function __construct(Closure $on_success, Closure $on_failure){
		$this->on_success = $on_success;
		$this->on_failure = $on_failure;
	}
}