<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#api-keys
 * Class ApiKeys
 * @package jamesvweston\EasyPost\EasyPost\Models\Responses
 */
class EasyPostApiKeys
{

    use SimpleSerialize;

    /**
     * The User id of the authenticated User making the API Key request
     * @var	string
     */
    protected $id;

    /**
     * A list of all Child Users presented with ONLY id, children, and key array structures.
     * @var	array
     */
    protected $children;

    /**
     * The list of all API keys active for an account, both for "test" and "production" modes.
     * @var	EasyPostApiKey[]
     */
    protected $keys;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->children                 = AU::get($data['children'], []);

        $this->keys                     = [];
        $keys                           = AU::get($data['keys']);
        foreach ($keys AS $item)
            $this->keys[]               = new EasyPostApiKey($item);

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param array $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return EasyPostApiKey[]
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * @param EasyPostApiKey[] $keys
     */
    public function setKeys($keys)
    {
        $this->keys = $keys;
    }

}