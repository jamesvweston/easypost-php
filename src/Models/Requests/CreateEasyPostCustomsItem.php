<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Requests;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;

class CreateEasyPostCustomsItem implements \JsonSerializable
{

    use SimpleSerialize;

    /**
     * "T-Shirt"
     * @var string
     */
    protected $description;

    /**
     * 1
     * @var int
     */
    protected $quantity;

    /**
     * 5
     * @var float
     */
    protected $weight;

    /**
     * 10
     * @var float
     */
    protected $value;

    /**
     * "123456"
     * @var string
     */
    protected $hs_tariff_number;

    /**
     * "US"
     * @var string
     */
    protected $origin_country;


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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getHsTariffNumber()
    {
        return $this->hs_tariff_number;
    }

    /**
     * @param string $hs_tariff_number
     */
    public function setHsTariffNumber($hs_tariff_number)
    {
        $this->hs_tariff_number = $hs_tariff_number;
    }

    /**
     * @return string
     */
    public function getOriginCountry()
    {
        return $this->origin_country;
    }

    /**
     * @param string $origin_country
     */
    public function setOriginCountry($origin_country)
    {
        $this->origin_country = $origin_country;
    }

}