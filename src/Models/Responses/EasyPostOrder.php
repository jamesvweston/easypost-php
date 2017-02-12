<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#orders
 * Class Order
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostOrder
{

    use SimpleSerialize;

    /**
     * Unique, begins with "order_"
     * @var	string
     */
    protected $id;

    /**
     * "Order"
     * @var	string
     */
    protected $object;

    /**
     * An optional field that may be used in place of id in other API endpoints
     * @var	string
     */
    protected $reference;

    /**
     * "test" or "production"
     * @var	string
     */
    protected $mode;

    /**
     * The destination address
     * @var	EasyPostAddress
     */
    protected $to_address;

    /**
     * The origin address
     * @var	EasyPostAddress
     */
    protected $from_address;

    /**
     * The shipper's address, defaults to from_address
     * @var	EasyPostAddress
     */
    protected $return_address;

    /**
     * The buyer's address, defaults to to_address
     * @var	EasyPostAddress
     */
    protected $buyer_address;

    /**
     * All associated Shipment objects
     * @var	EasyPostShipment[]
     */
    protected $shipments;

    /**
     * All associated Rate objects
     * @var	EasyPostRate[]
     */
    protected $rates;

    /**
     * Any carrier errors encountered during rating
     * @var	EasyPostMessage[]
     */
    protected $messages;

    /**
     * Set true to create as a return
     * @var	boolean
     */
    protected $is_return;

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
        $this->reference                = AU::get($data['reference']);
        $this->mode                     = AU::get($data['mode']);

        $this->to_address               = AU::get($data['to_address']);
        if (!is_null($this->to_address))
            $this->to_address           = new EasyPostAddress($this->to_address);

        $this->from_address             = AU::get($data['from_address']);
        if (!is_null($this->from_address))
            $this->from_address         = new EasyPostAddress($this->from_address);

        $this->return_address           = AU::get($data['return_address']);
        if (!is_null($this->return_address))
            $this->return_address       = new EasyPostAddress($this->return_address);

        $this->buyer_address            = AU::get($data['buyer_address']);
        if (!is_null($this->buyer_address))
            $this->buyer_address        = new EasyPostAddress($this->buyer_address);

        $this->shipments                = [];
        $shipments                      = AU::get($data['shipments'], []);
        foreach ($shipments AS $item)
            $this->shipments[]          = new EasyPostShipment($item);

        $this->rates                    = [];
        $rates                          = AU::get($data['rates'], []);
        foreach ($rates AS $item)
            $this->rates[]              = new EasyPostRate($item);

        $this->messages                 = [];
        $messages                       = AU::get($data['messages'], []);
        foreach ($messages AS $item)
            $this->messages[]           = new EasyPostMessage($item);

        $this->is_return                = AU::get($data['is_return']);
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
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
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
     * @return EasyPostAddress
     */
    public function getToAddress()
    {
        return $this->to_address;
    }

    /**
     * @param EasyPostAddress $to_address
     */
    public function setToAddress($to_address)
    {
        $this->to_address = $to_address;
    }

    /**
     * @return EasyPostAddress
     */
    public function getFromAddress()
    {
        return $this->from_address;
    }

    /**
     * @param EasyPostAddress $from_address
     */
    public function setFromAddress($from_address)
    {
        $this->from_address = $from_address;
    }

    /**
     * @return EasyPostAddress
     */
    public function getReturnAddress()
    {
        return $this->return_address;
    }

    /**
     * @param EasyPostAddress $return_address
     */
    public function setReturnAddress($return_address)
    {
        $this->return_address = $return_address;
    }

    /**
     * @return EasyPostAddress
     */
    public function getBuyerAddress()
    {
        return $this->buyer_address;
    }

    /**
     * @param EasyPostAddress $buyer_address
     */
    public function setBuyerAddress($buyer_address)
    {
        $this->buyer_address = $buyer_address;
    }

    /**
     * @return EasyPostShipment[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @param EasyPostShipment[] $shipments
     */
    public function setShipments($shipments)
    {
        $this->shipments = $shipments;
    }

    /**
     * @return EasyPostRate[]
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * @param EasyPostRate[] $rates
     */
    public function setRates($rates)
    {
        $this->rates = $rates;
    }

    /**
     * @return EasyPostMessage[]
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param EasyPostMessage[] $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return boolean
     */
    public function isIsReturn()
    {
        return $this->is_return;
    }

    /**
     * @param boolean $is_return
     */
    public function setIsReturn($is_return)
    {
        $this->is_return = $is_return;
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