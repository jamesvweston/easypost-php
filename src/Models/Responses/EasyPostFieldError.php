<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#field-error-object
 * Class FieldError
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostFieldError
{

    use SimpleSerialize;

    /**
     * Field of the request that the error describes
     * @var string
     */
    protected $field;

    /**
     * Human readable description of the problem
     * @var string
     */
    protected $message;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->field                    = AU::get($data['field']);
        $this->message                  = AU::get($data['message']);
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
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param string $field
     */
    public function setField($field)
    {
        $this->field = $field;
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

}