<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#tracker-object
 * Class Tracker
 * @package jamesvweston\EasyPost\EasyPost\Models\Responses
 */
class EasyPostTracker
{

    use SimpleSerialize;

    /**
     * Unique identifier, begins with "trk_"
     * @var	string
     */
    protected $id;

    /**
     * "Tracker"
     * @var	string
     */
    protected $object;

    /**
     * "test" or "production"
     * @var	string
     */
    protected $mode;

    /**
     * The tracking code provided by the carrier
     * @var	string
     */
    protected $tracking_code;

    /**
     * The current status of the package
     * Possible values are "unknown", "pre_transit", "in_transit", "out_for_delivery", "delivered", "available_for_pickup", "return_to_sender", "failure", "cancelled" or "error"
     * @var	string
     */
    protected $status;

    /**
     * The name of the person who signed for the package (if available)
     * @var	string
     */
    protected $signed_by;

    /**
     * The weight of the package as measured by the carrier in ounces (if available)
     * @var	float
     */
    protected $weight;

    /**
     * The estimated delivery date provided by the carrier (if available)
     * @var	string
     */
    protected $est_delivery_date;

    /**
     * The id of the EasyPost Shipment object associated with the Tracker (if any)
     * @var	string
     */
    protected $shipment_id;

    /**
     * The name of the carrier handling the shipment
     * @var	string
     */
    protected $carrier;

    /**
     * Array of the associated TrackingDetail objects
     * @var	EasyPostTrackingDetail[]
     */
    protected $tracking_details;

    /**
     * The associated CarrierDetail object (if available)
     * @var	EasyPostCarrierDetail
     */
    protected $carrier_detail;

    /**
     * URL to a publicly-accessible html page that shows tracking details for this tracker
     * @var	string
     */
    protected $public_url;

    /**
     * Array of the associated Fee objects
     * @var	EasyPostFee[]
     */
    protected $fees;

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
        $this->mode                     = AU::get($data['mode']);
        $this->tracking_code            = AU::get($data['tracking_code']);
        $this->status                   = AU::get($data['status']);
        $this->signed_by                = AU::get($data['signed_by']);
        $this->weight                   = AU::get($data['weight']);
        $this->est_delivery_date        = AU::get($data['est_delivery_date']);
        $this->shipment_id              = AU::get($data['shipment_id']);
        $this->carrier                  = AU::get($data['carrier']);

        $this->tracking_details         = [];
        $tracking_details               = AU::get($data['tracking_details'], []);
        foreach ($tracking_details AS $item)
            $this->tracking_details[]   = new EasyPostTrackingDetail($item);


        $this->carrier_detail           = AU::get($data['carrier_detail']);
        if (!is_null($this->carrier_detail))
            $this->carrier_detail       = new EasyPostCarrierDetail($this->carrier_detail);

        $this->public_url               = AU::get($data['public_url']);

        $this->fees                     = [];
        $fees                           = AU::get($data['fees'], []);
        foreach ($fees AS $item)
            $this->fees[]               = new EasyPostFee($item);

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
    public function getTrackingCode()
    {
        return $this->tracking_code;
    }

    /**
     * @param string $tracking_code
     */
    public function setTrackingCode($tracking_code)
    {
        $this->tracking_code = $tracking_code;
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
    public function getSignedBy()
    {
        return $this->signed_by;
    }

    /**
     * @param string $signed_by
     */
    public function setSignedBy($signed_by)
    {
        $this->signed_by = $signed_by;
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
    public function getEstDeliveryDate()
    {
        return $this->est_delivery_date;
    }

    /**
     * @param string $est_delivery_date
     */
    public function setEstDeliveryDate($est_delivery_date)
    {
        $this->est_delivery_date = $est_delivery_date;
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
     * @return EasyPostTrackingDetail[]
     */
    public function getTrackingDetails()
    {
        return $this->tracking_details;
    }

    /**
     * @param EasyPostTrackingDetail[] $tracking_details
     */
    public function setTrackingDetails($tracking_details)
    {
        $this->tracking_details = $tracking_details;
    }

    /**
     * @return EasyPostCarrierDetail
     */
    public function getCarrierDetail()
    {
        return $this->carrier_detail;
    }

    /**
     * @param EasyPostCarrierDetail $carrier_detail
     */
    public function setCarrierDetail($carrier_detail)
    {
        $this->carrier_detail = $carrier_detail;
    }

    /**
     * @return string
     */
    public function getPublicUrl()
    {
        return $this->public_url;
    }

    /**
     * @param string $public_url
     */
    public function setPublicUrl($public_url)
    {
        $this->public_url = $public_url;
    }

    /**
     * @return EasyPostFee[]
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @param EasyPostFee[] $fees
     */
    public function setFees($fees)
    {
        $this->fees = $fees;
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