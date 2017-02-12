<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#message-object
 * Class Message
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostMessage
{

    use SimpleSerialize;

    /**
     * 	the name of the carrier generating the error, e.g. "UPS"
     * @var string
     */
    protected $carrier;

    /**
     * the category of error that occurred. Most frequently "rate_error"
     * @var string
     */
    protected $type;

    /**
     * the string from the carrier explaining the problem.
     * @var string
     */
    protected $message;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->carrier                  = AU::get($data['carrier']);
        $this->type                     = AU::get($data['type']);
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