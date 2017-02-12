<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#shipping-insurance
 * Class Insurance
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostInsurance
{

    use SimpleSerialize;

    /**
     * @var float
     */
    protected $amount;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->amount                   = AU::get($data['amount']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->simpleSerialize();
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

}