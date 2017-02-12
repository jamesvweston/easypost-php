<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class EasyPostCarrierDetail
{

    use SimpleSerialize;

    /**
     * "CarrierDetail"
     * @var	string
     */
    protected $object;

    /**
     * The service level the associated shipment was shipped with (if available)
     * @var	string
     */
    protected $service;

    /**
     * The type of container the associated shipment was shipped in (if available)
     * @var	string
     */
    protected $container_type;

    /**
     * The estimated delivery date as provided by the carrier, in the local time zone (if available)
     * @var	string
     */
    protected $est_delivery_date_local;

    /**
     * The estimated delivery time as provided by the carrier, in the local time zone (if available)
     * @var	string
     */
    protected $est_delivery_time_local;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->object                   = AU::get($data['object']);
        $this->service                  = AU::get($data['service']);
        $this->container_type           = AU::get($data['container_type']);
        $this->est_delivery_date_local  = AU::get($data['est_delivery_date_local']);
        $this->est_delivery_time_local  = AU::get($data['est_delivery_time_local']);
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
    public function getContainerType()
    {
        return $this->container_type;
    }

    /**
     * @param string $container_type
     */
    public function setContainerType($container_type)
    {
        $this->container_type = $container_type;
    }

    /**
     * @return string
     */
    public function getEstDeliveryDateLocal()
    {
        return $this->est_delivery_date_local;
    }

    /**
     * @param string $est_delivery_date_local
     */
    public function setEstDeliveryDateLocal($est_delivery_date_local)
    {
        $this->est_delivery_date_local = $est_delivery_date_local;
    }

    /**
     * @return string
     */
    public function getEstDeliveryTimeLocal()
    {
        return $this->est_delivery_time_local;
    }

    /**
     * @param string $est_delivery_time_local
     */
    public function setEstDeliveryTimeLocal($est_delivery_time_local)
    {
        $this->est_delivery_time_local = $est_delivery_time_local;
    }

}