<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Requests;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;

class CreateEasyPostAddress implements \JsonSerializable
{

    use SimpleSerialize;

    /**
     * First line of the address
     * @var	string
     */
    protected $street1;

    /**
     * Second line of the address
     * @var	string
     */
    protected $street2;

    /**
     * Full city name
     * @var string
     */
    protected $city;

    /**
     * State or province
     * @var string
     */
    protected $state;

    /**
     * ZIP or postal code
     * @var	string
     */
    protected $zip;

    /**
     * ISO 3166 country code for the country the address is located in
     * @var string
     */
    protected $country;

    /**
     * Name of attention, if person. Both name and company can be included
     * @var	string
     */
    protected $name;

    /**
     * Name of attention, if organization. Both name and company can be included
     * @var string
     */
    protected $company;

    /**
     * Phone number to reach the person or organization
     * @var	string
     */
    protected $phone;

    /**
     * Email to reach the person or organization
     * @var string
     */
    protected $email;

    /**
     * Residential delivery indicator
     * @var	bool
     */
    protected $residential;

    /**
     * The specific designation for the address (only relevant if the address is a carrier facility)
     * @var	string
     */
    protected $carrier_facility;

    /**
     * Federal tax identifier of the person or organization
     * @var	string
     */
    protected $federal_tax_id;

    /**
     * State tax identifier of the person or organization
     * @var	string
     */
    protected $state_tax_id;

    /**
     * The verifications to perform when creating. verify_strict takes precedence
     * [delivery, zip4]
     * @var	string
     */
    protected $verify;

    /**
     * The verifications to perform when creating. The failure of any of these verifications causes the whole request to fail
     * [delivery, zip4]
     * @var	string
     */
    protected $verify_strict;


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
     * @return string
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * @param string $street2
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
     * @return string
     */
    public function getCarrierFacility()
    {
        return $this->carrier_facility;
    }

    /**
     * @param string $carrier_facility
     */
    public function setCarrierFacility($carrier_facility)
    {
        $this->carrier_facility = $carrier_facility;
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
     * @return string
     */
    public function getVerify()
    {
        return $this->verify;
    }

    /**
     * @param string $verify
     */
    public function setVerify($verify)
    {
        $this->verify = $verify;
    }

    /**
     * @return string
     */
    public function getVerifyStrict()
    {
        return $this->verify_strict;
    }

    /**
     * @param string $verify_strict
     */
    public function setVerifyStrict($verify_strict)
    {
        $this->verify_strict = $verify_strict;
    }

}