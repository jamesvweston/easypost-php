<?php

namespace jamesvweston\EasyPost\Models\Requests;


use jamesvweston\EasyPost\Traits\SimpleSerialize;

class CreateEasyPostCustomsInfo implements \JsonSerializable
{

    use SimpleSerialize;

    /**
     * true
     * @var string
     */
    protected $customs_certify;

    /**
     * "Steve Brule"
     * @var string
     */
    protected $cutoms_signer;

    /**
     * "merchandise"
     * @var string
     */
    protected $contents_type;

    /**
     * "none"
     * @var string
     */
    protected $restriction_type;

    /**
     * "NOEEI 30.37(a)"
     * @var string
     */
    protected $eel_pfc;

    /**
     * [<CustomsItem>,<CustomsItem>,...]
     * @var CreateEasyPostCustomsItem[]
     */
    protected $customs_items;


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
    public function getCustomsCertify()
    {
        return $this->customs_certify;
    }

    /**
     * @param string $customs_certify
     */
    public function setCustomsCertify($customs_certify)
    {
        $this->customs_certify = $customs_certify;
    }

    /**
     * @return string
     */
    public function getCutomsSigner()
    {
        return $this->cutoms_signer;
    }

    /**
     * @param string $cutoms_signer
     */
    public function setCutomsSigner($cutoms_signer)
    {
        $this->cutoms_signer = $cutoms_signer;
    }

    /**
     * @return string
     */
    public function getContentsType()
    {
        return $this->contents_type;
    }

    /**
     * @param string $contents_type
     */
    public function setContentsType($contents_type)
    {
        $this->contents_type = $contents_type;
    }

    /**
     * @return string
     */
    public function getRestrictionType()
    {
        return $this->restriction_type;
    }

    /**
     * @param string $restriction_type
     */
    public function setRestrictionType($restriction_type)
    {
        $this->restriction_type = $restriction_type;
    }

    /**
     * @return string
     */
    public function getEelPfc()
    {
        return $this->eel_pfc;
    }

    /**
     * @param string $eel_pfc
     */
    public function setEelPfc($eel_pfc)
    {
        $this->eel_pfc = $eel_pfc;
    }

    /**
     * @return CreateEasyPostCustomsItem[]
     */
    public function getCustomsItems()
    {
        return $this->customs_items;
    }

    /**
     * @param CreateEasyPostCustomsItem[] $customs_items
     */
    public function setCustomsItems($customs_items)
    {
        $this->customs_items = $customs_items;
    }

}