<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#carrier-account-object
 * Class Field
 * @package jamesvweston\EasyPost\EasyPost\Models\Responses
 */
class EasyPostField
{

    use SimpleSerialize;

    /**
     * Each key in the sub-objects of a CarrierAccount's fields is the name of a settable field
     * @var	string
     */
    protected $key;

    /**
     * The visibility value is used to control form field types, and is discussed in the CarrierType section
     * @var	string
     */
    protected $visibility;

    /**
     * The label value is used in form rendering to display a more precise field name
     * @var	string
     */
    protected $label;

    /**
     * Checkbox fields use "0" and "1" as False and True, all other field types present plaintext, partly-masked, or masked credential data for reference
     * @var	string
     */
    protected $value;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->key                      = AU::get($data['key']);
        $this->visibility               = AU::get($data['visibility']);
        $this->label                    = AU::get($data['label']);
        $this->value                    = AU::get($data['value']);
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
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param string $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}