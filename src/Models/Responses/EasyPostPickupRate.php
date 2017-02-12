<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#pickups
 * Class PickupRate
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostPickupRate
{

    use SimpleSerialize;

    /**
     * Unique, begins with 'pickuprate_'
     * @var	string
     */
    protected $id;

    /**
     * "PickupRate"
     * @var	string
     */
    protected $object;

    /**
     * "test" or "production"
     * @var	string
     */
    protected $mode;

    /**
     * service name
     * @var	string
     */
    protected $service;

    /**
     * name of carrier
     * @var	string
     */
    protected $carrier;

    /**
     * The actual rate quote for this service
     * @var	string
     */
    protected $rate;

    /**
     * currency for the rate
     * @var	string
     */
    protected $currency;

    /**
     * the ID of the pickup this is a quote for
     * @var	string
     */
    protected $pickup_id;

    /**
     * @var	string
     */
    protected $created_at;

    /**
     * @var	string
     */
    protected $updated_at;


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->simpleSerialize();
    }

}