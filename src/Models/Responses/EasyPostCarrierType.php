<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#carrier-types
 * Class CarrierType
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostCarrierType
{

    use SimpleSerialize;

    /**
     * "CarrierType"
     * @var	string
     */
    protected $object;

    /**
     * Specifies the CarrierAccount type.
     * Note that "EndiciaAccount" is the current USPS integration account type
     * @var	string
     */
    protected $type;

    /**
     * Contains at least one of the following keys:
     * "auto_link", "credentials", "test_credentials", and "custom_workflow"
     * @var	array
     */
    protected $fields;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->object                   = AU::get($data['object']);
        $this->type                     = AU::get($data['type']);
        $this->fields                   = AU::get($data['fields']);
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
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param array $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

}