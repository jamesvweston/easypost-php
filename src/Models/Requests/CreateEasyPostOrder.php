<?php

namespace jamesvweston\EasyPost\Models\Requests;


use jamesvweston\EasyPost\Traits\SimpleSerialize;

class CreateEasyPostOrder implements \JsonSerializable
{

    use SimpleSerialize;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var CreateEasyPostAddress|string
     */
    protected $to_address;

    /**
     * @var CreateEasyPostAddress|string
     */
    protected $from_address;

    /**
     * Shipment ids comma separated
     * @var string
     */
    protected $shipments;

    /**
     * Carrier account ids comma separated
     * @var string
     */
    protected $carrier_accounts;


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
     * @return CreateEasyPostAddress|string
     */
    public function getToAddress()
    {
        return $this->to_address;
    }

    /**
     * @param CreateEasyPostAddress|string $to_address
     */
    public function setToAddress($to_address)
    {
        $this->to_address = $to_address;
    }

    /**
     * @return CreateEasyPostAddress|string
     */
    public function getFromAddress()
    {
        return $this->from_address;
    }

    /**
     * @param CreateEasyPostAddress|string $from_address
     */
    public function setFromAddress($from_address)
    {
        $this->from_address = $from_address;
    }

    /**
     * @return string
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @param string $shipments
     */
    public function setShipments($shipments)
    {
        $this->shipments = $shipments;
    }

    /**
     * @return string
     */
    public function getCarrierAccounts()
    {
        return $this->carrier_accounts;
    }

    /**
     * @param string $carrier_accounts
     */
    public function setCarrierAccounts($carrier_accounts)
    {
        $this->carrier_accounts = $carrier_accounts;
    }

}