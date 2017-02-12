<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#rate-object
 * Class Rate
 * @package jamesvweston\EasyPost\EasyPost\Models\Responses
 */
class EasyPostRate
{

    use SimpleSerialize;

    /**
     * unique, begins with 'rate_'
     * @var	string
     */
    protected $id;

    /**
     * "Rate"
     * @var	string
     */
    protected $object;

    /**
     * "test" or "production"
     * @var	string
     */
    protected $mode;

    /**
     * service level/name
     * @var	string
     */
    protected $service;

    /**
     * name of carrier
     * @var	string
     */
    protected $carrier;

    /**
     * ID of the CarrierAccount record used to generate this rate
     * @var	string
     */
    protected $carrier_account_id;

    /**
     * ID of the Shipment this rate belongs to
     * @var	string
     */
    protected $shipment_id;

    /**
     * the actual rate quote for this service
     * @var	string
     */
    protected $rate;

    /**
     * currency for the rate
     * @var	string
     */
    protected $currency;

    /**
     * the retail rate is the in-store rate given with no account
     * @var	string
     */
    protected $retail_rate;

    /**
     * currency for the retail rate
     * @var	string
     */
    protected $retail_currency;

    /**
     * the list rate is the non-negotiated rate given for having an account with the carrier
     * @var	string
     */
    protected $list_rate;

    /**
     * currency for the list rate
     * @var	string
     */
    protected $list_currency;

    /**
     * delivery days for this service
     * @var	int
     */
    protected $delivery_days;

    /**
     * date for delivery
     * @var	string
     */
    protected $delivery_date;

    /**
     * indicates if delivery window is guaranteed (true) or not (false)
     * @var	boolean
     */
    protected $delivery_date_guaranteed;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $updated_at;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->object                   = AU::get($data['object']);
        $this->mode                     = AU::get($data['mode']);
        $this->service                  = AU::get($data['service']);
        $this->carrier                  = AU::get($data['carrier']);
        $this->carrier_account_id       = AU::get($data['carrier_account_id']);
        $this->shipment_id              = AU::get($data['shipment_id']);
        $this->rate                     = AU::get($data['rate']);
        $this->currency                 = AU::get($data['currency']);
        $this->retail_rate              = AU::get($data['retail_rate']);
        $this->retail_currency          = AU::get($data['retail_currency']);
        $this->list_rate                = AU::get($data['list_rate']);
        $this->list_currency            = AU::get($data['list_currency']);
        $this->delivery_days            = AU::get($data['delivery_days']);
        $this->delivery_date            = AU::get($data['delivery_date']);
        $this->delivery_date_guaranteed = AU::get($data['delivery_date_guaranteed']);
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
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param string $carrier
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    /**
     * @return string
     */
    public function getCarrierAccountId()
    {
        return $this->carrier_account_id;
    }

    /**
     * @param string $carrier_account_id
     */
    public function setCarrierAccountId($carrier_account_id)
    {
        $this->carrier_account_id = $carrier_account_id;
    }

    /**
     * @return string
     */
    public function getShipmentId()
    {
        return $this->shipment_id;
    }

    /**
     * @param string $shipment_id
     */
    public function setShipmentId($shipment_id)
    {
        $this->shipment_id = $shipment_id;
    }

    /**
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param string $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
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
    public function getRetailRate()
    {
        return $this->retail_rate;
    }

    /**
     * @param string $retail_rate
     */
    public function setRetailRate($retail_rate)
    {
        $this->retail_rate = $retail_rate;
    }

    /**
     * @return string
     */
    public function getRetailCurrency()
    {
        return $this->retail_currency;
    }

    /**
     * @param string $retail_currency
     */
    public function setRetailCurrency($retail_currency)
    {
        $this->retail_currency = $retail_currency;
    }

    /**
     * @return string
     */
    public function getListRate()
    {
        return $this->list_rate;
    }

    /**
     * @param string $list_rate
     */
    public function setListRate($list_rate)
    {
        $this->list_rate = $list_rate;
    }

    /**
     * @return string
     */
    public function getListCurrency()
    {
        return $this->list_currency;
    }

    /**
     * @param string $list_currency
     */
    public function setListCurrency($list_currency)
    {
        $this->list_currency = $list_currency;
    }

    /**
     * @return int
     */
    public function getDeliveryDays()
    {
        return $this->delivery_days;
    }

    /**
     * @param int $delivery_days
     */
    public function setDeliveryDays($delivery_days)
    {
        $this->delivery_days = $delivery_days;
    }

    /**
     * @return string
     */
    public function getDeliveryDate()
    {
        return $this->delivery_date;
    }

    /**
     * @param string $delivery_date
     */
    public function setDeliveryDate($delivery_date)
    {
        $this->delivery_date = $delivery_date;
    }

    /**
     * @return boolean
     */
    public function isDeliveryDateGuaranteed()
    {
        return $this->delivery_date_guaranteed;
    }

    /**
     * @param boolean $delivery_date_guaranteed
     */
    public function setDeliveryDateGuaranteed($delivery_date_guaranteed)
    {
        $this->delivery_date_guaranteed = $delivery_date_guaranteed;
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