<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class EasyPostVerifications
{

    use SimpleSerialize;

    /**
     * @var EasyPostVerification
     */
    protected $zip4;

    /**
     * @var EasyPostVerification
     */
    protected $delivery;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->zip4                     = AU::get($data['zip4']);
        if (!is_null($this->zip4))
            $this->zip4                 = new EasyPostVerification($this->zip4);

        $this->delivery                 = AU::get($data['delivery']);
        if (!is_null($this->delivery))
            $this->delivery             = new EasyPostVerification($this->delivery);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->simpleSerialize();
    }

    /**
     * @return EasyPostVerification
     */
    public function getZip4()
    {
        return $this->zip4;
    }

    /**
     * @param EasyPostVerification $zip4
     */
    public function setZip4($zip4)
    {
        $this->zip4 = $zip4;
    }

    /**
     * @return EasyPostVerification
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param EasyPostVerification $delivery
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

}