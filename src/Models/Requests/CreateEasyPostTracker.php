<?php

namespace jamesvweston\EasyPost\Models\Requests;


use jamesvweston\EasyPost\Traits\SimpleSerialize;

class CreateEasyPostTracker implements \JsonSerializable
{

    use SimpleSerialize;

    /**
     * @var string
     */
    protected $tracking_code;

    /**
     * @var string
     */
    protected $carrier;


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

}