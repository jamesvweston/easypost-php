<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#customs-item-object
 * Class CustomsItem
 * @package jamesvweston\EasyPost\EasyPost\Models\Responses
 */
class EasyPostCustomItem
{

    use SimpleSerialize;

    /**
     * Unique, begins with 'cstitem_'
     * @var	string
     */
    protected $id;

    /**
     * 'CustomsItem'
     * @var	string
     */
    protected $object;

    /**
     * Required, description of item being shipped
     * @var	string
     */
    protected $description;

    /**
     * Required, greater than zero
     * @var	float
     */
    protected $quantity;

    /**
     * (USD)	Required, greater than zero, total value (unit value * quantity)
     * @var	float
     */
    protected $value;

    /**
     * Required, greater than zero, total weight (unit weight * quantity)
     * @var	float (oz)
     */
    protected $weight;

    /**
     * Harmonized Tariff Schedule, e.g. "6109.10.0012" for Men's T-shirts
     * @var	string
     */
    protected $hs_tariff_number;

    /**
     * SKU/UPC or other product identifier
     * @var	string
     */
    protected $code;

    /**
     * Required, 2 char country code
     * @var	string
     */
    protected $origin_country;

    /**
     * 3 char currency code, default USD
     * @var	string
     */
    protected $currency;

    /**
     * @var	string
     */
    protected $created_at;

    /**
     * @var	string
     */
    protected $updated_at;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->object                   = AU::get($data['object']);
        $this->description              = AU::get($data['description']);
        $this->quantity                 = AU::get($data['quantity']);
        $this->value                    = AU::get($data['value']);
        $this->weight                   = AU::get($data['weight']);
        $this->hs_tariff_number         = AU::get($data['hs_tariff_number']);
        $this->code                     = AU::get($data['code']);
        $this->origin_country           = AU::get($data['origin_country']);
        $this->currency                 = AU::get($data['currency']);
        $this->created_at               = AU::get($data['created_at']);
        $this->updated_at               = AU::get($data['updated_at']);
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

}