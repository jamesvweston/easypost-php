<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#tracking-detail-object
 * Class TrackingLocation
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostTrackingLocation
{

    use SimpleSerialize;

    /**
     * "TrackingLocation"
     * @var	string
     */
    protected $object;

    /**
     * The city where the scan event occurred (if available)
     * @var	string
     */
    protected $city;

    /**
     * The state where the scan event occurred (if available)
     * @var	string
     */
    protected $state;

    /**
     * The country where the scan event occurred (if available)
     * @var	string
     */
    protected $country;

    /**
     * The postal code where the scan event occurred (if available)
     * @var	string
     */
    protected $zip;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->object                   = AU::get($data['object']);
        $this->city                     = AU::get($data['city']);
        $this->state                    = AU::get($data['state']);
        $this->country                  = AU::get($data['country']);
        $this->zip                      = AU::get($data['zip']);
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
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

}