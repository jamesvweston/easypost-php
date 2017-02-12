<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#addresses
 * Class Address
 * @package jamesvweston\EasyPost\EasyPost\Models\Responses
 */
class EasyPostAddress implements \JsonSerializable
{

    use SimpleSerialize;

    /**
     * Unique identifier, begins with "adr_"
     * @var int
     */
    protected $id;

    /**
     * "Address"
     * @var string
     */
    protected $object;

    /**
     * Set based on which api-key you used, either "test" or "production"
     * @var string
     */
    protected $mode;

    /**
     * @var string
     */
    protected $street1;

    /**
     * @var string|null
     */
    protected $street2;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $zip;

    /**
     * ISO 3166 country code for the country the address is located in
     * @var string
     */
    protected $country;

    /**
     * Whether or not this address would be considered residential
     * @var bool
     */
    protected $residential;

    /**
     * The specific designation for the address (only relevant if the address is a carrier facility)
     * @var string|null
     */
    protected $carrier_facility;

    /**
     * Name of the person. Both name and company can be included
     * @var string
     */
    protected $name;

    /**
     * Name of the organization. Both name and company can be included
     * @var string
     */
    protected $company;

    /**
     * Phone number to reach the person or organization
     * @var string
     */
    protected $phone;

    /**
     * Email to reach the person or organization
     * @var string
     */
    protected $email;

    /**
     * Federal tax identifier of the person or organization
     * @var string
     */
    protected $federal_tax_id;

    /**
     * State tax identifier of the person or organization
     * @var string
     */
    protected $state_tax_id;

    /**
     * @var EasyPostVerifications
     */
    protected $verifications;


    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->object                   = AU::get($data['object']);
        $this->mode                     = AU::get($data['mode']);
        $this->street1                  = AU::get($data['street1']);
        $this->street2                  = AU::get($data['street2']);
        $this->city                     = AU::get($data['city']);
        $this->state                    = AU::get($data['state']);
        $this->zip                      = AU::get($data['zip']);
        $this->country                  = AU::get($data['country']);
        $this->residential              = AU::get($data['residential']);
        $this->carrier_facility         = AU::get($data['carrier_facility']);
        $this->name                     = AU::get($data['name']);
        $this->company                  = AU::get($data['company']);
        $this->phone                    = AU::get($data['phone']);
        $this->email                    = AU::get($data['email']);
        $this->federal_tax_id           = AU::get($data['federal_tax_id']);
        $this->state_tax_id             = AU::get($data['state_tax_id']);

        $this->verifications            = AU::get($data['verifications'], []);
        $this->verifications            = !empty($this->verifications) ? new EasyPostVerifications($this->verifications) : null;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->simpleSerialize();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
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
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return string
     */
    public function getStreet1()
    {
        return $this->street1;
    }

    /**
     * @param string $street1
     */
    public function setStreet1($street1)
    {
        $this->street1 = $street1;
    }

    /**
     * @return null|string
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * @param null|string $street2
     */
    public function setStreet2($street2)
    {
        $this->street2 = $street2;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return boolean
     */
    public function isResidential()
    {
        return $this->residential;
    }

    /**
     * @param boolean $residential
     */
    public function setResidential($residential)
    {
        $this->residential = $residential;
    }

    /**
     * @return null|string
     */
    public function getCarrierFacility()
    {
        return $this->carrier_facility;
    }

    /**
     * @param null|string $carrier_facility
     */
    public function setCarrierFacility($carrier_facility)
    {
        $this->carrier_facility = $carrier_facility;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFederalTaxId()
    {
        return $this->federal_tax_id;
    }

    /**
     * @param string $federal_tax_id
     */
    public function setFederalTaxId($federal_tax_id)
    {
        $this->federal_tax_id = $federal_tax_id;
    }

    /**
     * @return string
     */
    public function getStateTaxId()
    {
        return $this->state_tax_id;
    }

    /**
     * @param string $state_tax_id
     */
    public function setStateTaxId($state_tax_id)
    {
        $this->state_tax_id = $state_tax_id;
    }

    /**
     * @return EasyPostVerifications
     */
    public function getVerifications()
    {
        return $this->verifications;
    }

    /**
     * @param EasyPostVerifications $verifications
     */
    public function setVerifications($verifications)
    {
        $this->verifications = $verifications;
    }

}