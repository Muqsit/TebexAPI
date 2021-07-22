<?php

declare(strict_types=1);

namespace muqsit\tebexapi;

use muqsit\tebexapi\connection\response\EmptyTebexResponse;
use muqsit\tebexapi\connection\response\TebexResponseHandler;
use muqsit\tebexapi\endpoint\bans\TebexBanEntry;
use muqsit\tebexapi\endpoint\bans\TebexBanList;
use muqsit\tebexapi\endpoint\checkout\TebexCheckoutInfo;
use muqsit\tebexapi\endpoint\coupons\create\TebexCouponCreateResponse;
use muqsit\tebexapi\endpoint\coupons\create\TebexCreatedCoupon;
use muqsit\tebexapi\endpoint\coupons\TebexCoupon;
use muqsit\tebexapi\endpoint\coupons\TebexCouponsList;
use muqsit\tebexapi\endpoint\giftcards\TebexGiftCard;
use muqsit\tebexapi\endpoint\giftcards\TebexGiftCardsList;
use muqsit\tebexapi\endpoint\information\TebexInformation;
use muqsit\tebexapi\endpoint\listing\TebexListingInfo;
use muqsit\tebexapi\endpoint\package\TebexPackage;
use muqsit\tebexapi\endpoint\package\TebexPackages;
use muqsit\tebexapi\endpoint\queue\commands\offline\TebexQueuedOfflineCommandsInfo;
use muqsit\tebexapi\endpoint\queue\commands\online\TebexQueuedOnlineCommandsInfo;
use muqsit\tebexapi\endpoint\queue\TebexDuePlayersInfo;
use muqsit\tebexapi\endpoint\sales\TebexSalesList;
use muqsit\tebexapi\endpoint\user\TebexUser;

interface TebexApi{

	public function getLatency() : float;

	/**
	 * @param TebexResponseHandler<TebexInformation> $callback
	 */
	public function getInformation(TebexResponseHandler $callback) : void;

	/**
	 * @param TebexResponseHandler<TebexSalesList> $callback
	 */
	public function getSales(TebexResponseHandler $callback) : void;

	/**
	 * @param TebexResponseHandler<TebexCouponsList> $callback
	 */
	public function getCoupons(TebexResponseHandler $callback) : void;

	/**
	 * @param int $coupon_id
	 * @param TebexResponseHandler<TebexCoupon> $callback
	 */
	public function getCoupon(int $coupon_id, TebexResponseHandler $callback) : void;

	/**
	 * @param TebexResponseHandler<TebexBanList> $callback
	 */
	public function getBanList(TebexResponseHandler $callback) : void;

	/**
	 * @param TebexResponseHandler<TebexQueuedOfflineCommandsInfo> $callback
	 */
	public function getQueuedOfflineCommands(TebexResponseHandler $callback) : void;

	/**
	 * @param TebexResponseHandler<TebexDuePlayersInfo> $callback
	 */
	public function getDuePlayersList(TebexResponseHandler $callback) : void;

	/**
	 * @param int $player_id
	 * @param TebexResponseHandler<TebexQueuedOnlineCommandsInfo> $callback
	 */
	public function getQueuedOnlineCommands(int $player_id, TebexResponseHandler $callback) : void;

	/**
	 * @param TebexResponseHandler<TebexListingInfo> $callback
	 */
	public function getListing(TebexResponseHandler $callback) : void;

	/**
	 * @param int $package_id
	 * @param TebexResponseHandler<TebexPackage> $callback
	 */
	public function getPackage(int $package_id, TebexResponseHandler $callback) : void;

	/**
	 * @param TebexResponseHandler<TebexPackages> $callback
	 */
	public function getPackages(TebexResponseHandler $callback) : void;

	/**
	 * @param int[] $command_ids
	 * @param TebexResponseHandler<EmptyTebexResponse>|null $callback
	 */
	public function deleteCommands(array $command_ids, ?TebexResponseHandler $callback = null) : void;

	/**
	 * @param string $username_or_uuid
	 * @param TebexResponseHandler<TebexUser> $callback
	 */
	public function lookup(string $username_or_uuid, TebexResponseHandler $callback) : void;

	/**
	 * @param string $username_or_uuid
	 * @param string|null $reason
	 * @param string|null $ip
	 * @param TebexResponseHandler<TebexBanEntry>|null $callback
	 */
	public function ban(string $username_or_uuid, ?string $reason = null, ?string $ip = null, ?TebexResponseHandler $callback = null) : void;

	/**
	 * @param int $package_id
	 * @param string $username
	 * @param TebexResponseHandler<TebexCheckoutInfo> $callback
	 */
	public function checkout(int $package_id, string $username, TebexResponseHandler $callback) : void;

	/**
	 * @param TebexCreatedCoupon $coupon
	 * @param TebexResponseHandler<TebexCouponCreateResponse> $callback
	 */
	public function createCoupon(TebexCreatedCoupon $coupon, TebexResponseHandler $callback) : void;

	/**
	 * @param int $gift_card_id
	 * @param TebexResponseHandler<TebexGiftCard> $callback
	 */
	public function getGiftCard(int $gift_card_id, TebexResponseHandler $callback) : void;

	/**
	 * @param TebexResponseHandler<TebexGiftCardsList> $callback
	 */
	public function getGiftCards(TebexResponseHandler $callback) : void;

	/**
	 * @param string|null $expires_at
	 * @param string $note
	 * @param string $amount
	 * @param TebexResponseHandler<TebexGiftCard> $callback
	 */
	public function createGiftCard(?string $expires_at, string $note, string $amount, TebexResponseHandler $callback) : void;

	/**
	 * @param int $gift_card_id
	 * @param TebexResponseHandler<TebexGiftCard>|null $callback
	 */
	public function deleteGiftCard(int $gift_card_id, ?TebexResponseHandler $callback = null) : void;

	/**
	 * @param int $gift_card_id
	 * @param string $amount
	 * @param TebexResponseHandler<TebexGiftCard>|null $callback
	 */
	public function topUpGiftCard(int $gift_card_id, string $amount, ?TebexResponseHandler $callback = null) : void;
}