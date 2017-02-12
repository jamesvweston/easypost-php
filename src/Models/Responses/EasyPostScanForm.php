<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#scan-form-object
 * Class ScanForm
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostScanForm
{

    use SimpleSerialize;

    /**
     * Unique, begins with "sf_"
     * @var	string
     */
    protected $id;

    /**
     * "ScanForm"
     * @var	string
     */
    protected $object;

    /**
     * Current status. Possible values are "creating", "created" and "failed"
     * @var	string
     */
    protected $status;

    /**
     * Human readable message explaining any failures
     * @var	string
     */
    protected $message;

    /**
     * Address the will be Shipments shipped from
     * @var	EasyPostAddress
     */
    protected $address;

    /**
     * Tracking codes included on the ScanForm
     * @var	string[]
     */
    protected $tracking_codes;

    /**
     * Url of the document
     * @var	string
     */
    protected $form_url;

    /**
     * File format of the document
     * @var	string
     */
    protected $form_file_type;

    /**
     * The id of the associated Batch. Unique, starts with "batch_"
     * @var	string
     */
    protected $batch_id;

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
        $this->status                   = AU::get($data['status']);
        $this->message                  = AU::get($data['message']);

        $this->address                  = AU::get($data['address']);
        if (!is_null($this->address))
            $this->address              = new EasyPostAddress($this->address);

        $this->tracking_codes           = AU::get($data['tracking_codes'], []);
        $this->form_url                 = AU::get($data['form_url']);
        $this->form_file_type           = AU::get($data['form_file_type']);
        $this->batch_id                 = AU::get($data['batch_id']);
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
     * @return EasyPostAddress
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param EasyPostAddress $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \string[]
     */
    public function getTrackingCodes()
    {
        return $this->tracking_codes;
    }

    /**
     * @param \string[] $tracking_codes
     */
    public function setTrackingCodes($tracking_codes)
    {
        $this->tracking_codes = $tracking_codes;
    }

    /**
     * @return string
     */
    public function getFormUrl()
    {
        return $this->form_url;
    }

    /**
     * @param string $form_url
     */
    public function setFormUrl($form_url)
    {
        $this->form_url = $form_url;
    }

    /**
     * @return string
     */
    public function getFormFileType()
    {
        return $this->form_file_type;
    }

    /**
     * @param string $form_file_type
     */
    public function setFormFileType($form_file_type)
    {
        $this->form_file_type = $form_file_type;
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