<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#pickups
 * Class Pickup
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostPickup
{

    use SimpleSerialize;

    /**
     * Unique, begins with "pickup_"
     * @var	string
     */
    protected $id;

    /**
     * "Pickup"
     * @var	string
     */
    protected $object;

    /**
     * An optional field that may be used in place of ID in some API endpoints
     * @var	string
     */
    protected $reference;

    /**
     * "test" or "production"
     * @var	string
     */
    protected $mode;

    /**
     * One of: "unknown", "scheduled", or "canceled"
     * @var	string
     */
    protected $status;

    /**
     * The earliest time at which the package is available to pick up
     * @var	string
     */
    protected $min_datetime;

    /**
     * The latest time at which the package is available to pick up. Must be later than the min_datetime
     * @var	string
     */
    protected $max_datetime;

    /**
     * Is the pickup address the account's address?
     * @var	boolean
     */
    protected $is_account_address;

    /**
     * Additional text to help the driver successfully obtain the package
     * @var	string
     */
    protected $instructions;

    /**
     * A list of messages containing carrier errors encountered during pickup rate generation
     * @var	EasyPostMessage[]
     */
    protected $messages;

    /**
     * The confirmation number for a booked pickup from the carrier
     * @var	string
     */
    protected $confirmation;

    /**
     * The associated Shipment
     * @var	EasyPostShipment
     */
    protected $shipment;

    /**
     * The associated Address
     * @var	EasyPostAddress
     */
    protected $address;

    /**
     * The list of carriers (if empty, all carriers were used) used to generate pickup rates
     * @var	EasyPostCarrierAccount[]
     */
    protected $carrier_accounts;

    /**
     * The list of different pickup rates across valid carrier accounts for the shipment
     * @var	EasyPostPickupRate[]
     */
    protected $pickup_rates;

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