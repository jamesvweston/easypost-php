<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#carrier-account-object
 * Class Fields
 * @package jamesvweston\EasyPost\EasyPost\Models\Responses
 */
class EasyPostFields
{

    use SimpleSerialize;

    /**
     * Credentials used in the production environment.
     * @var	EasyPostField
     */
    protected $credentials;

    /**
     * Credentials used in the test environment.
     * @var	EasyPostField
     */
    protected $test_credentials;

    /**
     * For USPS this designates that no credentials are required.
     * @var	boolean
     */
    protected $auto_link;

    /**
     * When present, a seperate authentication process will be required through the UI to link this account type.
     * @var	boolean
     */
    protected $custom_workflow;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->credentials              = AU::get($data['credentials']);
        if (!is_null($this->credentials))
            $this->credentials          = new EasyPostField($this->credentials);

        $this->test_credentials         = AU::get($data['test_credentials']);
        if (!is_null($this->test_credentials))
            $this->test_credentials     = new EasyPostField($this->test_credentials);

        $this->auto_link                = AU::get($data['auto_link']);
        $this->custom_workflow          = AU::get($data['custom_workflow']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->simpleSerialize();
    }

    /**
     * @return EasyPostField
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @param EasyPostField $credentials
     */
    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @return EasyPostField
     */
    public function getTestCredentials()
    {
        return $this->test_credentials;
    }

    /**
     * @param EasyPostField $test_credentials
     */
    public function setTestCredentials($test_credentials)
    {
        $this->test_credentials = $test_credentials;
    }

    /**
     * @return boolean
     */
    public function isAutoLink()
    {
        return $this->auto_link;
    }

    /**
     * @param boolean $auto_link
     */
    public function setAutoLink($auto_link)
    {
        $this->auto_link = $auto_link;
    }

    /**
     * @return boolean
     */
    public function isCustomWorkflow()
    {
        return $this->custom_workflow;
    }

    /**
     * @param boolean $custom_workflow
     */
    public function setCustomWorkflow($custom_workflow)
    {
        $this->custom_workflow = $custom_workflow;
    }

}