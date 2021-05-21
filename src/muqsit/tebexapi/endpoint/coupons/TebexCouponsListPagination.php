<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\coupons;

final class TebexCouponsListPagination{

	/**
	 * @param array<string, mixed> $response
	 * @return self
	 */
	public static function fromTebexResponse(array $response) : self{
		/**
		 * @var array{
		 * 		totalResults: int,
		 * 		currentPage: int,
		 * 		lastPage: int,
		 * 		previous: ?int,
		 * 		next: ?string
		 * } $response
		 */

		return new self($response["totalResults"], $response["currentPage"], $response["lastPage"], $response["previous"], $response["next"]);
	}

	private int $total;
	private int $current_page;
	private int $last_page;
	private ?int $previous;
	private ?string $next_url;

	public function __construct(int $total, int $current_page, int $last_page, ?int $previous, ?string $next_url){
		$this->total = $total;
		$this->current_page = $current_page;
		$this->last_page = $last_page;
		$this->previous = $previous;
		$this->next_url = $next_url;
	}

	public function getTotal() : int{
		return $this->total;
	}

	public function getCurrentPage() : int{
		return $this->current_page;
	}

	public function getLastPage() : int{
		return $this->last_page;
	}

	public function getPrevious() : ?int{
		return $this->previous;
	}

	public function getNextUrl() : ?string{
		return $this->next_url;
	}
}