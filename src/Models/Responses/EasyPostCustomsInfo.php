<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#customs-info-object
 * Class CustomsInfo
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostCustomsInfo
{

    use SimpleSerialize;

    /**
     * Unique, begins with 'cstinfo_'
     * @var	string
     */
    protected $id;

    /**
     * 'CustomsInfo'
     * @var	string
     */
    protected $object;

    /**
     * "EEL" or "PFC"
     * value less than $2500: "NOEEI 30.37(a)"; value greater than $2500: see Customs Guide
     * @var	string
     */
    protected $eel_pfc;

    /**
     * "documents", "gift", "merchandise", "returned_goods", "sample", or "other"
     * @var	string
     */
    protected $contents_type;

    /**
     * Human readable description of content. Required for certain carriers and always required if contents_type is "other"
     * @var	string
     */
    protected $contents_explanation;

    /**
     * Electronically certify the information provided
     * @var	boolean
     */
    protected $customs_certify;

    /**
     * Required if customs_certify is true
     * @var	string
     */
    protected $customs_signer;

    /**
     * "abandon" or "return", defaults to "return"
     * @var	string
     */
    protected $non_delivery_option;

    /**
     * "none", "other", "quarantine", or "sanitary_phytosanitary_inspection"
     * @var	string
     */
    protected $restriction_type;

    /**
     * Required if restriction_type is not "none"
     * @var	string
     */
    protected $restriction_comments;

    /**
     * Describes to products being shipped
     * @var	EasyPostCustomItem[]
     */
    protected $customs_items;

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
        $this->eel_pfc                  = AU::get($data['eel_pfc']);
        $this->contents_type            = AU::get($data['contents_type']);
        $this->contents_explanation     = AU::get($data['contents_explanation']);
        $this->customs_certify          = AU::get($data['customs_certify']);
        $this->customs_signer           = AU::get($data['customs_signer']);
        $this->non_delivery_option      = AU::get($data['non_delivery_option']);
        $this->restriction_type         = AU::get($data['restriction_type']);
        $this->restriction_comments     = AU::get($data['restriction_comments']);

        $this->customs_items            = [];
        $customs_items                  = AU::get($data['customs_items'], []);
        foreach ($customs_items AS $item)
        {
            $this->customs_items[]      = new EasyPostCustomItem($item);
        }

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
    public function getEelPfc()
    {
        return $this->eel_pfc;
    }

    /**
     * @param string $eel_pfc
     */
    public function setEelPfc($eel_pfc)
    {
        $this->eel_pfc = $eel_pfc;
    }

    /**
     * @return string
     */
    public function getContentsType()
    {
        return $this->contents_type;
    }

    /**
     * @param string $contents_type
     */
    public function setContentsType($contents_type)
    {
        $this->contents_type = $contents_type;
    }

    /**
     * @return string
     */
    public function getContentsExplanation()
    {
        return $this->contents_explanation;
    }

    /**
     * @param string $contents_explanation
     */
    public function setContentsExplanation($contents_explanation)
    {
        $this->contents_explanation = $contents_explanation;
    }

    /**
     * @return boolean
     */
    public function isCustomsCertify()
    {
        return $this->customs_certify;
    }

    /**
     * @param boolean $customs_certify
     */
    public function setCustomsCertify($customs_certify)
    {
        $this->customs_certify = $customs_certify;
    }

    /**
     * @return string
     */
    public function getCustomsSigner()
    {
        return $this->customs_signer;
    }

    /**
     * @param string $customs_signer
     */
    public function setCustomsSigner($customs_signer)
    {
        $this->customs_signer = $customs_signer;
    }

    /**
     * @return string
     */
    public function getNonDeliveryOption()
    {
        return $this->non_delivery_option;
    }

    /**
     * @param string $non_delivery_option
     */
    public function setNonDeliveryOption($non_delivery_option)
    {
        $this->non_delivery_option = $non_delivery_option;
    }

    /**
     * @return string
     */
    public function getRestrictionType()
    {
        return $this->restriction_type;
    }

    /**
     * @param string $restriction_type
     */
    public function setRestrictionType($restriction_type)
    {
        $this->restriction_type = $restriction_type;
    }

    /**
     * @return string
     */
    public function getRestrictionComments()
    {
        return $this->restriction_comments;
    }

    /**
     * @param string $restriction_comments
     */
    public function setRestrictionComments($restriction_comments)
    {
        $this->restriction_comments = $restriction_comments;
    }

    /**
     * @return EasyPostCustomItem[]
     */
    public function getCustomsItems()
    {
        return $this->customs_items;
    }

    /**
     * @param EasyPostCustomItem[] $customs_items
     */
    public function setCustomsItems($customs_items)
    {
        $this->customs_items = $customs_items;
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