<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#carrier-account-object
 * Class CarrierAccount
 * @package jamesvweston\EasyPost\EasyPost\Models\Responses
 */
class EasyPostCarrierAccount
{

    use SimpleSerialize;

    /**
     * Unique, begins with "ca_"
     * @var	string
     */
    protected $id;

    /**
     * "CarrierAccount"
     * @var	string
     */
    protected $object;

    /**
     * The name of the carrier type. Note that "EndiciaAccount" is the current USPS integration account type
     * @var	string
     */
    protected $type;

    /**
     * Contains "credentials" and/or "test_credentials", or may be empty
     * @var	EasyPostFields
     */
    protected $fields;

    /**
     * If clone is true, only the reference and description are possible to update
     * @var	boolean
     */
    protected $clone;

    /**
     * An optional, user-readable field to help distinguish accounts
     * @var	string
     */
    protected $description;

    /**
     * An optional field that may be used in place of carrier_account_id in other API endpoints
     * @var	string
     */
    protected $reference;

    /**
     * The name used when displaying a readable value for the type of the account
     * @var	string
     */
    protected $readable;

    /**
     * Unlike the "credentials" object contained in "fields", this nullable object contains just raw credential pairs for client library consumption
     * @var	array|null
     */
    protected $credentials;

    /**
     * Unlike the "test_credentials" object contained in "fields", this nullable object contains just raw test_credential pairs for client library consumption
     * @var	array|null
     */
    protected $test_credentials;

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
        $this->type                     = AU::get($data['type']);

        $this->fields                   = AU::get($data['fields']);
        if (!is_null($this->fields))
            $this->fields               = new EasyPostFields($this->fields);

        $this->clone                    = AU::get($data['clone']);
        $this->description              = AU::get($data['description']);
        $this->reference                = AU::get($data['reference']);
        $this->readable                 = AU::get($data['readable']);
        $this->credentials              = AU::get($data['credentials']);
        $this->test_credentials         = AU::get($data['test_credentials']);
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return EasyPostFields
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param EasyPostFields $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return boolean
     */
    public function isClone()
    {
        return $this->clone;
    }

    /**
     * @param boolean $clone
     */
    public function setClone($clone)
    {
        $this->clone = $clone;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getReadable()
    {
        return $this->readable;
    }

    /**
     * @param string $readable
     */
    public function setReadable($readable)
    {
        $this->readable = $readable;
    }

    /**
     * @return array|null
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @param array|null $credentials
     */
    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @return array|null
     */
    public function getTestCredentials()
    {
        return $this->test_credentials;
    }

    /**
     * @param array|null $test_credentials
     */
    public function setTestCredentials($test_credentials)
    {
        $this->test_credentials = $test_credentials;
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