<?php

declare(strict_types=1);

namespace muqsit\tebexapi;

use muqsit\tebexapi\connection\request\TebexRequest;
use muqsit\tebexapi\connection\response\EmptyTebexResponse;
use muqsit\tebexapi\connection\response\TebexResponseHandler;
use muqsit\tebexapi\endpoint\bans\TebexBanEntry;
use muqsit\tebexapi\endpoint\bans\TebexBanList;
use muqsit\tebexapi\endpoint\bans\TebexBanListRequest;
use muqsit\tebexapi\endpoint\bans\TebexBanRequest;
use muqsit\tebexapi\endpoint\checkout\TebexCheckoutInfo;
use muqsit\tebexapi\endpoint\checkout\TebexCheckoutRequest;
use muqsit\tebexapi\endpoint\coupons\create\TebexCouponCreateRequest;
use muqsit\tebexapi\endpoint\coupons\create\TebexCouponCreateResponse;
use muqsit\tebexapi\endpoint\coupons\create\TebexCreatedCoupon;
use muqsit\tebexapi\endpoint\coupons\TebexCoupon;
use muqsit\tebexapi\endpoint\coupons\TebexCouponRequest;
use muqsit\tebexapi\endpoint\coupons\TebexCouponsList;
use muqsit\tebexapi\endpoint\coupons\TebexCouponsRequest;
use muqsit\tebexapi\endpoint\giftcards\TebexGiftCard;
use muqsit\tebexapi\endpoint\giftcards\TebexGiftCardCreateRequest;
use muqsit\tebexapi\endpoint\giftcards\TebexGiftCardDeleteRequest;
use muqsit\tebexapi\endpoint\giftcards\TebexGiftCardRequest;
use muqsit\tebexapi\endpoint\giftcards\TebexGiftCardsList;
use muqsit\tebexapi\endpoint\giftcards\TebexGiftCardsRequest;
use muqsit\tebexapi\endpoint\giftcards\TebexGiftCardTopUpRequest;
use muqsit\tebexapi\endpoint\information\TebexInformation;
use muqsit\tebexapi\endpoint\information\TebexInformationRequest;
use muqsit\tebexapi\endpoint\listing\TebexListingInfo;
use muqsit\tebexapi\endpoint\listing\TebexListingRequest;
use muqsit\tebexapi\endpoint\package\TebexPackage;
use muqsit\tebexapi\endpoint\package\TebexPackageRequest;
use muqsit\tebexapi\endpoint\package\TebexPackages;
use muqsit\tebexapi\endpoint\package\TebexPackagesRequest;
use muqsit\tebexapi\endpoint\queue\commands\offline\TebexQueuedOfflineCommandsInfo;
use muqsit\tebexapi\endpoint\queue\commands\offline\TebexQueuedOfflineCommandsListRequest;
use muqsit\tebexapi\endpoint\queue\commands\online\TebexQueuedOnlineCommandsInfo;
use muqsit\tebexapi\endpoint\queue\commands\online\TebexQueuedOnlineCommandsListRequest;
use muqsit\tebexapi\endpoint\queue\commands\TebexDeleteCommandRequest;
use muqsit\tebexapi\endpoint\queue\TebexDuePlayersInfo;
use muqsit\tebexapi\endpoint\queue\TebexDuePlayersListRequest;
use muqsit\tebexapi\endpoint\sales\TebexSalesList;
use muqsit\tebexapi\endpoint\sales\TebexSalesRequest;
use muqsit\tebexapi\endpoint\user\TebexUser;
use muqsit\tebexapi\endpoint\user\TebexUserLookupRequest;

abstract class BaseTebexApi implements TebexApi{

	/**
	 * @param TebexRequest $request
	 * @param TebexResponseHandler $callback
	 *
	 * @phpstan-template TTebexResponse of \muqsit\tebexapi\connection\response\TebexResponse
	 * @phpstan-param TebexRequest<TTebexResponse> $request
	 * @phpstan-param TebexResponseHandler<TTebexResponse> $callback
	 */
	abstract public function request(TebexRequest $request, TebexResponseHandler $callback) : void;

	/**
	 * @param TebexResponseHandler<TebexInformation> $callback
	 */
	final public function getInformation(TebexResponseHandler $callback) : void{
		$this->request(new TebexInformationRequest(), $callback);
	}

	/**
	 * @param TebexResponseHandler<TebexSalesList> $callback
	 */
	final public function getSales(TebexResponseHandler $callback) : void{
		$this->request(new TebexSalesRequest(), $callback);
	}

	/**
	 * @param TebexResponseHandler<TebexCouponsList> $callback
	 */
	final public function getCoupons(TebexResponseHandler $callback) : void{
		$this->request(new TebexCouponsRequest(), $callback);
	}

	/**
	 * @param int $coupon_id
	 * @param TebexResponseHandler<TebexCoupon> $callback
	 */
	final public function getCoupon(int $coupon_id, TebexResponseHandler $callback) : void{
		$this->request(new TebexCouponRequest($coupon_id), $callback);
	}

	/**
	 * @param TebexResponseHandler<TebexBanList> $callback
	 */
	final public function getBanList(TebexResponseHandler $callback) : void{
		$this->request(new TebexBanListRequest(), $callback);
	}

	/**
	 * @param TebexResponseHandler<TebexQueuedOfflineCommandsInfo> $callback
	 */
	final public function getQueuedOfflineCommands(TebexResponseHandler $callback) : void{
		$this->request(new TebexQueuedOfflineCommandsListRequest(), $callback);
	}

	/**
	 * @param TebexResponseHandler<TebexDuePlayersInfo> $callback
	 */
	final public function getDuePlayersList(TebexResponseHandler $callback) : void{
		$this->request(new TebexDuePlayersListRequest(), $callback);
	}

	/**
	 * @param int $player_id
	 * @param TebexResponseHandler<TebexQueuedOnlineCommandsInfo> $callback
	 */
	final public function getQueuedOnlineCommands(int $player_id, TebexResponseHandler $callback) : void{
		$this->request(new TebexQueuedOnlineCommandsListRequest($player_id), $callback);
	}

	/**
	 * @param TebexResponseHandler<TebexListingInfo> $callback
	 */
	final public function getListing(TebexResponseHandler $callback) : void{
		$this->request(new TebexListingRequest(), $callback);
	}

	/**
	 * @param int $package_id
	 * @param TebexResponseHandler<TebexPackage> $callback
	 */
	final public function getPackage(int $package_id, TebexResponseHandler $callback) : void{
		$this->request(new TebexPackageRequest($package_id), $callback);
	}

	/**
	 * @param TebexResponseHandler<TebexPackages> $callback
	 */
	final public function getPackages(TebexResponseHandler $callback) : void{
		$this->request(new TebexPackagesRequest(), $callback);
	}

	/**
	 * @param int[] $command_ids
	 * @param TebexResponseHandler<EmptyTebexResponse>|null $callback
	 */
	final public function deleteCommands(array $command_ids, ?TebexResponseHandler $callback = null) : void{
		$this->request(new TebexDeleteCommandRequest($command_ids), $callback ?? TebexResponseHandler::onSuccess(static function(EmptyTebexResponse $response) : void{}));
	}

	/**
	 * @param string $username_or_uuid
	 * @param TebexResponseHandler<TebexUser> $callback
	 */
	final public function lookup(string $username_or_uuid, TebexResponseHandler $callback) : void{
		$this->request(new TebexUserLookupRequest($username_or_uuid), $callback);
	}

	/**
	 * @param string $username_or_uuid
	 * @param string|null $reason
	 * @param string|null $ip
	 * @param TebexResponseHandler<TebexBanEntry>|null $callback
	 */
	final public function ban(string $username_or_uuid, ?string $reason = null, ?string $ip = null, ?TebexResponseHandler $callback = null) : void{
		$this->request(new TebexBanRequest($username_or_uuid, $reason, $ip), $callback ?? TebexResponseHandler::onSuccess(static function(TebexBanEntry $response) : void{}));
	}

	/**
	 * @param int $package_id
	 * @param string $username
	 * @param TebexResponseHandler<TebexCheckoutInfo> $callback
	 */
	final public function checkout(int $package_id, string $username, TebexResponseHandler $callback) : void{
		$this->request(new TebexCheckoutRequest($package_id, $username), $callback);
	}

	/**
	 * @param TebexCreatedCoupon $coupon
	 * @param TebexResponseHandler<TebexCouponCreateResponse> $callback
	 */
	final public function createCoupon(TebexCreatedCoupon $coupon, TebexResponseHandler $callback) : void{
		$this->request(new TebexCouponCreateRequest($coupon), $callback);
	}

	/**
	 * @param int $gift_card_id
	 * @param TebexResponseHandler<TebexGiftCard> $callback
	 */
	final public function getGiftCard(int $gift_card_id, TebexResponseHandler $callback) : void{
		$this->request(new TebexGiftCardRequest($gift_card_id), $callback);
	}

	/**
	 * @param TebexResponseHandler<TebexGiftCardsList> $callback
	 */
	final public function getGiftCards(TebexResponseHandler $callback) : void{
		$this->request(new TebexGiftCardsRequest(), $callback);
	}

	/**
	 * @param string|null $expires_at
	 * @param string $note
	 * @param string $amount
	 * @param TebexResponseHandler<TebexGiftCard> $callback
	 */
	final public function createGiftCard(?string $expires_at, string $note, string $amount, TebexResponseHandler $callback) : void{
		$this->request(new TebexGiftCardCreateRequest($expires_at, $note, $amount), $callback);
	}

	/**
	 * @param int $gift_card_id
	 * @param TebexResponseHandler<TebexGiftCard>|null $callback
	 */
	final public function deleteGiftCard(int $gift_card_id, ?TebexResponseHandler $callback = null) : void{
		$this->request(new TebexGiftCardDeleteRequest($gift_card_id), $callback ?? TebexResponseHandler::onSuccess(static function(TebexGiftCard $response) : void{}));
	}

	/**
	 * @param int $gift_card_id
	 * @param string $amount
	 * @param TebexResponseHandler<TebexGiftCard>|null $callback
	 */
	final public function topUpGiftCard(int $gift_card_id, string $amount, ?TebexResponseHandler $callback = null) : void{
		$this->request(new TebexGiftCardTopUpRequest($gift_card_id, $amount), $callback ?? TebexResponseHandler::onSuccess(static function(TebexGiftCard $response) : void{}));
	}
}