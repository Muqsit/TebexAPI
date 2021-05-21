<?php

declare(strict_types=1);

namespace muqsit\tebexapi\endpoint\coupons\create;

final class TebexCouponBuilder{

	public static function new() : self{
		return new self();
	}

	private TebexCreatedCoupon $coupon;

	public function __construct(){
		$this->coupon = TebexCreatedCoupon::createWithDefaultParameters();
	}

	public function setCode(string $code) : self{
		$this->coupon->code = $code;
		return $this;
	}

	/**
	 * @param int[] $packages
	 * @return self
	 */
	public function setEffectiveOnPackages(array $packages = []) : self{
		$this->coupon->effective_on = TebexCreatedCoupon::EFFECTIVE_ON_PACKAGE;
		$this->coupon->packages = $packages;
		return $this;
	}

	/**
	 * @param int[] $categories
	 * @return self
	 */
	public function setEffectiveOnCategories(array $categories = []) : self{
		$this->coupon->effective_on = TebexCreatedCoupon::EFFECTIVE_ON_CATEGORY;
		$this->coupon->packages = $categories;
		return $this;
	}

	public function setDiscountPercentage(int $percentage) : self{
		$this->coupon->discount_type = TebexCreatedCoupon::DISCOUNT_TYPE_PERCENTAGE;
		$this->coupon->discount_percentage = $percentage;
		return $this;
	}

	public function setDiscountAmount(int $amount) : self{
		$this->coupon->discount_type = TebexCreatedCoupon::DISCOUNT_TYPE_VALUE;
		$this->coupon->discount_amount = $amount;
		return $this;
	}

	public function setRedeemUnlimited(bool $value) : self{
		$this->coupon->redeem_unlimited = $value;
		return $this;
	}

	public function setExpiryDate(string $date) : self{
		$this->coupon->expire_never = false;
		$this->coupon->expire_date = $date;
		return $this;
	}

	public function setExpiryDateFromTimestamp(int $timestamp) : self{
		return $this->setExpiryDate(date("Y-m-d", $timestamp));
	}

	public function setExpireNever() : self{
		$this->coupon->expire_never = true;
		return $this;
	}

	public function setStartDate(string $date) : self{
		$this->coupon->start_date = $date;
		return $this;
	}

	public function setStartDateFromTimestamp(int $timestamp) : self{
		return $this->setStartDate(date("Y-m-d", $timestamp));
	}

	public function setBasketType(string $type) : self{
		$this->coupon->basket_type = $type;
		return $this;
	}

	public function setBasketTypeSingle() : self{
		return $this->setBasketType(TebexCreatedCoupon::BASKET_TYPE_SINGLE);
	}

	public function setBasketTypeSubscription() : self{
		return $this->setBasketType(TebexCreatedCoupon::BASKET_TYPE_SUBSCRIPTION);
	}

	public function setBasketTypeBoth() : self{
		return $this->setBasketType(TebexCreatedCoupon::BASKET_TYPE_BOTH);
	}

	public function setMinimumBasketValue(int $value) : self{
		$this->coupon->minimum = $value;
		return $this;
	}

	public function setDiscountApplicationMethod(int $method) : self{
		$this->coupon->discount_application_method = $method;
		return $this;
	}

	public function setApplicationRuleIndividual() : self{
		return $this->setDiscountApplicationMethod(TebexCreatedCoupon::DISCOUNT_APP_METHOD_APPLY_EACH_PACKAGE);
	}

	public function setApplicationRuleBeforeSales() : self{
		return $this->setDiscountApplicationMethod(TebexCreatedCoupon::DISCOUNT_APP_METHOD_APPLY_BASKET_BEFORE_SALE);
	}

	public function setApplicationRuleAfterSales() : self{
		return $this->setDiscountApplicationMethod(TebexCreatedCoupon::DISCOUNT_APP_METHOD_APPLY_BASKET_AFTER_SALE);
	}

	public function setUsername(string $username) : self{
		$this->coupon->username = $username;
		return $this;
	}

	public function setNote(string $note) : self{
		$this->coupon->note = $note;
		return $this;
	}

	public function build() : TebexCreatedCoupon{
		return $this->coupon;
	}
}