<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#fee-object
 * Class Fee
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostFee
{

    use SimpleSerialize;

    /**
     * "Fee"
     * @var	string
     */
    protected $object;

    /**
     * The name of the category of fee. Possible types are "LabelFee", "PostageFee", "InsuranceFee", and "TrackerFee"
     * @var	string
     */
    protected $type;

    /**
     * USD value with sub-cent precision
     * @var	string
     */
    protected $amount;

    /**
     * Whether EasyPost has successfully charged your account for the fee
     * @var	boolean
     */
    protected $charged;

    /**
     * Whether the Fee has been refunded successfully
     * @var	boolean
     */
    protected $refunded;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->object                   = AU::get($data['object']);
        $this->type                     = AU::get($data['type']);
        $this->amount                   = AU::get($data['amount']);
        $this->charged                  = AU::get($data['charged']);
        $this->refunded                 = AU::get($data['refunded']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->simpleSerialize();
    }

    /**
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param string $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return boolean
     */
    public function isCharged()
    {
        return $this->charged;
    }

    /**
     * @param boolean $charged
     */
    public function setCharged($charged)
    {
        $this->charged = $charged;
    }

    /**
     * @return boolean
     */
    public function isRefunded()
    {
        return $this->refunded;
    }

    /**
     * @param boolean $refunded
     */
    public function setRefunded($refunded)
    {
        $this->refunded = $refunded;
    }

}