<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#tracking-detail-object
 * Class TrackingDetail
 * @package jamesvweston\EasyPost\EasyPost\Models\Responses
 */
class EasyPostTrackingDetail
{

    use SimpleSerialize;

    /**
     * "TrackingDetail"
     * @var	string
     */
    protected $object;

    /**
     * Description of the scan event
     * @var	string
     */
    protected $message;

    /**
     * Status of the package at the time of the scan event
     * Possible values are "unknown", "pre_transit", "in_transit", "out_for_delivery", "delivered", "available_for_pickup", "return_to_sender", "failure", "cancelled" or "error"
     * @var	string
     */
    protected $status;

    /**
     * The timestamp when the tracking scan occurred
     * @var	string
     */
    protected $datetime;

    /**
     * The original source of the information for this scan event, usually the carrier
     * @var	string
     */
    protected $source;

    /**
     * The location associated with the scan event
     * @var	EasyPostTrackingLocation
     */
    protected $tracking_location;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->object                   = AU::get($data['object']);
        $this->message                  = AU::get($data['message']);
        $this->status                   = AU::get($data['status']);
        $this->datetime                 = AU::get($data['datetime']);
        $this->source                   = AU::get($data['source']);
        $this->tracking_location        = AU::get($data['tracking_location']);
        if (!is_null($this->tracking_location))
            $this->tracking_location    = new EasyPostTrackingLocation($this->tracking_location);
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
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param string $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return EasyPostTrackingLocation
     */
    public function getTrackingLocation()
    {
        return $this->tracking_location;
    }

    /**
     * @param EasyPostTrackingLocation $tracking_location
     */
    public function setTrackingLocation($tracking_location)
    {
        $this->tracking_location = $tracking_location;
    }

}