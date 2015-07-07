<?php

namespace KellerWilliams\Bundle\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscription
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Subscription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * This is actually the product-handle in Chargify
     * @var integer
     *
     * @ORM\Column(name="chargify_product_id", type="integer")
     */
    private $chargifyProductId;

    /**
     * @var integer
     *
     * @ORM\Column(name="chargify_customer_id", type="integer")
     */
    private $chargifyCustomerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="chargify_payment_profile_id", type="integer", nullable=true)
     */
    private $chargifyPaymentProfileId;

    /**
     * @var string
     *
     * @ORM\Column(name="chargify_coupon_code", type="string", length=255, nullable=true)
     */
    private $chargifyCouponCode;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_first_name", type="string", length=255, nullable=true)
     */
    private $billingFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_last_name", type="string", length=255, nullable=true)
     */
    private $billingLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="creditcard_number", type="string", length=255)
     */
    private $creditcardNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="expiration_month", type="integer")
     */
    private $expirationMonth;

    /**
     * @var integer
     *
     * @ORM\Column(name="expiration_year", type="integer")
     */
    private $expirationYear;

    /**
     * @var integer
     *
     * @ORM\Column(name="cvv_code", type="integer", nullable=true)
     */
    private $cvvCode;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_zip", type="string", length=255, nullable=true)
     */
    private $billingZip;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set chargifyProductId (maps to product handle in Chargify)
     *
     * @param integer $chargifyProductId
     * @return Subscription
     */
    public function setChargifyProductId($chargifyProductId)
    {
        $this->chargifyProductId = $chargifyProductId;

        return $this;
    }

    /**
     * Get chargifyProductId (maps to product handle in Chargify)
     *
     * @return integer 
     */
    public function getChargifyProductId()
    {
        return $this->chargifyProductId;
    }

    /**
     * Set chargifyCustomerId
     *
     * @param integer $chargifyCustomerId
     * @return Subscription
     */
    public function setChargifyCustomerId($chargifyCustomerId)
    {
        $this->chargifyCustomerId = $chargifyCustomerId;

        return $this;
    }

    /**
     * Get chargifyCustomerId
     *
     * @return integer 
     */
    public function getChargifyCustomerId()
    {
        return $this->chargifyCustomerId;
    }

    /**
     * Set chargifyPaymentProfileId
     *
     * @param integer $chargifyPaymentProfileId
     * @return Subscription
     */
    public function setChargifyPaymentProfileId($chargifyPaymentProfileId)
    {
        $this->chargifyPaymentProfileId = $chargifyPaymentProfileId;

        return $this;
    }

    /**
     * Get chargifyPaymentProfileId
     *
     * @return integer 
     */
    public function getChargifyPaymentProfileId()
    {
        return $this->chargifyPaymentProfileId;
    }

    /**
     * Set chargifyCouponCode
     *
     * @param string $chargifyCouponCode
     * @return Subscription
     */
    public function setChargifyCouponCode($chargifyCouponCode)
    {
        $this->chargifyCouponCode = $chargifyCouponCode;

        return $this;
    }

    /**
     * Get chargifyCouponCode
     *
     * @return string 
     */
    public function getChargifyCouponCode()
    {
        return $this->chargifyCouponCode;
    }

    /**
     * Set billingFirstName
     *
     * @param string $billingFirstName
     * @return Subscription
     */
    public function setBillingFirstName($billingFirstName)
    {
        $this->billingFirstName = $billingFirstName;

        return $this;
    }

    /**
     * Get billingFirstName
     *
     * @return string 
     */
    public function getBillingFirstName()
    {
        return $this->billingFirstName;
    }

    /**
     * Set billingLastName
     *
     * @param string $billingLastName
     * @return Subscription
     */
    public function setBillingLastName($billingLastName)
    {
        $this->billingLastName = $billingLastName;

        return $this;
    }

    /**
     * Get billingLastName
     *
     * @return string 
     */
    public function getBillingLastName()
    {
        return $this->billingLastName;
    }

    /**
     * Set creditcardNumber
     *
     * @param string $creditcardNumber
     * @return Subscription
     */
    public function setCreditcardNumber($creditcardNumber)
    {
        $this->creditcardNumber = $creditcardNumber;

        return $this;
    }

    /**
     * Get creditcardNumber
     *
     * @return string 
     */
    public function getCreditcardNumber()
    {
        return $this->creditcardNumber;
    }

    /**
     * Set expirationMonth
     *
     * @param integer $expirationMonth
     * @return Subscription
     */
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = $expirationMonth;

        return $this;
    }

    /**
     * Get expirationMonth
     *
     * @return integer 
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * Set expirationYear
     *
     * @param integer $expirationYear
     * @return Subscription
     */
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = $expirationYear;

        return $this;
    }

    /**
     * Get expirationYear
     *
     * @return integer 
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }

    /**
     * Set cvvCode
     *
     * @param integer $cvvCode
     * @return Subscription
     */
    public function setCvvCode($cvvCode)
    {
        $this->cvvCode = $cvvCode;

        return $this;
    }

    /**
     * Get cvvCode
     *
     * @return integer 
     */
    public function getCvvCode()
    {
        return $this->cvvCode;
    }

    /**
     * Set billingZip
     *
     * @param string $billingZip
     * @return Subscription
     */
    public function setBillingZip($billingZip)
    {
        $this->billingZip = $billingZip;

        return $this;
    }

    /**
     * Get billingZip
     *
     * @return string 
     */
    public function getBillingZip()
    {
        return $this->billingZip;
    }
}
