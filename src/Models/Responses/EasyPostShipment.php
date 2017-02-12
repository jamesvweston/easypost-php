<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#shipments
 * Class Shipment
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostShipment
{

    use SimpleSerialize;

    /**
     * Unique, begins with "shp_"
     * @var string
     */
    protected $id;

    /**
     * "Shipment"
     * @var string
     */
    protected $object;

    /**
     * An optional field that may be used in place of id in other API endpoints
     * @var string
     */
    protected $reference;

    /**
     * "test" or "production"
     * @var string
     */
    protected $mode;

    /**
     * The destination address
     * @var EasyPostAddress
     */
    protected $to_address;

    /**
     * The origin address
     * @var EasyPostAddress
     */
    protected $from_address;

    /**
     * The shipper's address, defaults to from_address
     * @var EasyPostAddress
     */
    protected $return_address;

    /**
     * The buyer's address, defaults to to_address
     * @var EasyPostAddress
     */
    protected $buyer_address;

    /**
     * The dimensions and weight of the package
     * @var EasyPostParcel
     */
    protected $parcel;

    /**
     * Information for the processing of customs
     * @var EasyPostCustomsInfo
     */
    protected $customs_info;

    /**
     * Document created to manifest and scan multiple shipments
     * @var EasyPostScanForm
     */
    protected $scan_form;

    /**
     * All associated Form objects
     * @var string[]
     */
    protected $forms;

    /**
     * The associated Insurance object
     * @var EasyPostInsurance
     */
    protected $insurance;

    /**
     * All associated Rate objects
     * @var EasyPostRate[]
     */
    protected $rates;

    /**
     * The specific rate purchased for the shipment, or null if unpurchased or purchased through another mechanism
     * @var EasyPostRate
     */
    protected $selected_rate;

    /**
     * The associated PostageLabel object
     * @var EasyPostPostageLabel|null
     */
    protected $postage_label;

    /**
     * Any carrier errors encountered during rating, discussed in more depth below
     * @var EasyPostMessage[]
     */
    protected $messages;

    /**
     * All of the options passed to the shipment, discussed in more depth below
     * @var EasyPostOptions
     */
    protected $options;

    /**
     * Set true to create as a return, discussed in more depth below
     * @var boolean
     */
    protected $is_return;

    /**
     * If purchased, the tracking code will appear here as well as within the Tracker object
     * @var string
     */
    protected $tracking_code;

    /**
     * The USPS zone of the shipment, if purchased with USPS
     * @var string
     */
    protected $usps_zone;

    /**
     * The current tracking status of the shipment
     * @var string
     */
    protected $status;

    /**
     * The associated Tracker object
     * @var EasyPostTracker
     */
    protected $tracker;

    /**
     * The associated Fee objects charged to the billing user account
     * @var EasyPostFee[]
     */
    protected $fees;

    /**
     * The current status of the shipment refund process. Possible values are "submitted", "refunded", "rejected".
     * @var string
     */
    protected $refund_status;

    /**
     * The ID of the batch that contains this shipment, if any
     * @var string
     */
    protected $batch_id;

    /**
     * The current state of the associated BatchShipment
     * @var string
     */
    protected $batch_status;

    /**
     * The current message of the associated BatchShipment
     * @var string
     */
    protected $batch_message;

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


        $this->parcel                   = AU::get($data['parcel']);
        if (!is_null($this->parcel))
            $this->parcel               = new EasyPostParcel($this->parcel);

        $this->customs_info             = AU::get($data['customs_info']);
        if (!is_null($this->customs_info))
            $this->customs_info         = new EasyPostCustomsInfo($this->customs_info);

        $this->scan_form                = AU::get($data['scan_form']);
        if (!is_null($this->scan_form))
            $this->scan_form            = new EasyPostScanForm($this->scan_form);

        $this->insurance                = AU::get($data['insurance']);
        if (!is_null($this->insurance))
            $this->insurance            = new EasyPostInsurance($this->insurance);

        $this->rates                    = [];
        $rates                          = AU::get($data['rates'], []);
        foreach ($rates AS $item)
            $this->rates[]              = new EasyPostRate($item);

        $this->selected_rate            = AU::get($data['selected_rate']);
        if (!is_null($this->selected_rate))
            $this->selected_rate        = new EasyPostRate($this->selected_rate);

        $this->postage_label            = AU::get($data['postage_label']);
        if (!is_null($this->postage_label))
            $this->postage_label        = new EasyPostPostageLabel($this->postage_label);

        $this->messages                 = [];
        $messages                       = AU::get($data['messages']);
        foreach ($messages AS $item)
            $this->messages[]           = new EasyPostMessage($item);



        $this->options                  = AU::get($data['options']);
        if (!is_null($this->options))
            $this->options              = new EasyPostOptions($this->options);

        $this->is_return                = AU::get($data['is_return']);
        $this->tracking_code            = AU::get($data['tracking_code']);
        $this->usps_zone                = AU::get($data['usps_zone']);

        $this->status                   = AU::get($data['status']);

        $this->tracker                  = AU::get($data['tracker']);
        if (!is_null($this->tracker))
            $this->tracker              = new EasyPostTracker($this->tracker);

        $this->fees                     = [];
        $fees                           = AU::get($data['fees'], []);
        foreach ($fees AS $item)
            $this->fees[]               = new EasyPostFee($item);

        $this->refund_status            = AU::get($data['refund_status']);
        $this->batch_id                 = AU::get($data['batch_id']);
        $this->batch_status             = AU::get($data['batch_status']);
        $this->batch_message            = AU::get($data['batch_message']);
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
     * @return EasyPostParcel
     */
    public function getParcel()
    {
        return $this->parcel;
    }

    /**
     * @param EasyPostParcel $parcel
     */
    public function setParcel($parcel)
    {
        $this->parcel = $parcel;
    }

    /**
     * @return EasyPostCustomsInfo
     */
    public function getCustomsInfo()
    {
        return $this->customs_info;
    }

    /**
     * @param EasyPostCustomsInfo $customs_info
     */
    public function setCustomsInfo($customs_info)
    {
        $this->customs_info = $customs_info;
    }

    /**
     * @return EasyPostScanForm
     */
    public function getScanForm()
    {
        return $this->scan_form;
    }

    /**
     * @param EasyPostScanForm $scan_form
     */
    public function setScanForm($scan_form)
    {
        $this->scan_form = $scan_form;
    }

    /**
     * @return \string[]
     */
    public function getForms()
    {
        return $this->forms;
    }

    /**
     * @param \string[] $forms
     */
    public function setForms($forms)
    {
        $this->forms = $forms;
    }

    /**
     * @return EasyPostInsurance
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * @param EasyPostInsurance $insurance
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;
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
     * @return EasyPostRate
     */
    public function getSelectedRate()
    {
        return $this->selected_rate;
    }

    /**
     * @param EasyPostRate $selected_rate
     */
    public function setSelectedRate($selected_rate)
    {
        $this->selected_rate = $selected_rate;
    }

    /**
     * @return EasyPostPostageLabel|null
     */
    public function getPostageLabel()
    {
        return $this->postage_label;
    }

    /**
     * @param EasyPostPostageLabel|null $postage_label
     */
    public function setPostageLabel($postage_label)
    {
        $this->postage_label = $postage_label;
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
     * @return EasyPostOptions
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param EasyPostOptions $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
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
    public function getUspsZone()
    {
        return $this->usps_zone;
    }

    /**
     * @param string $usps_zone
     */
    public function setUspsZone($usps_zone)
    {
        $this->usps_zone = $usps_zone;
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
     * @return EasyPostTracker
     */
    public function getTracker()
    {
        return $this->tracker;
    }

    /**
     * @param EasyPostTracker $tracker
     */
    public function setTracker($tracker)
    {
        $this->tracker = $tracker;
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
    public function getRefundStatus()
    {
        return $this->refund_status;
    }

    /**
     * @param string $refund_status
     */
    public function setRefundStatus($refund_status)
    {
        $this->refund_status = $refund_status;
    }

    /**
     * @return string
     */
    public function getBatchId()
    {
        return $this->batch_id;
    }

    /**
     * @param string $batch_id
     */
    public function setBatchId($batch_id)
    {
        $this->batch_id = $batch_id;
    }

    /**
     * @return string
     */
    public function getBatchStatus()
    {
        return $this->batch_status;
    }

    /**
     * @param string $batch_status
     */
    public function setBatchStatus($batch_status)
    {
        $this->batch_status = $batch_status;
    }

    /**
     * @return string
     */
    public function getBatchMessage()
    {
        return $this->batch_message;
    }

    /**
     * @param string $batch_message
     */
    public function setBatchMessage($batch_message)
    {
        $this->batch_message = $batch_message;
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