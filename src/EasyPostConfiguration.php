<?php

namespace jamesvweston\EasyPost\EasyPost;


use jamesvweston\Utilities\ArrayUtil AS AU;
/**
 * Class EasyPostConfiguration
 * @package jamesvweston\EasyPost\EasyPost
 */
class EasyPostConfiguration
{

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var string
     */
    protected $url;


    public function __construct($data = [])
    {
        $this->apiKey                   = AU::get($data['apiKey']);
        $this->version                  = AU::get($data['version'], 'v2');
        $this->baseUri                  = AU::get($data['baseUri'], 'https://api.easypost.com');

        $this->setUrl();
    }


    private function setUrl ()
    {
        if (is_null($this->apiKey) || is_null($this->version) || is_null($this->baseUri))
            return;

        $this->url                      = $this->baseUri . '/' . $this->version;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->setUrl();
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
        $this->setUrl();
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * @param string $baseUri
     */
    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
        $this->setUrl();
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

}