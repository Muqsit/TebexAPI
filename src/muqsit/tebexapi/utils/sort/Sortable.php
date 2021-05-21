<?php

declare(strict_types=1);

namespace muqsit\tebexapi\utils\sort;

interface Sortable{

	public function getOrder() : int;
}