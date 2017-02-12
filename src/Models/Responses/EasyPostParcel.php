<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#parcels
 * Class Parcel
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostParcel
{

    use SimpleSerialize;

    /**
     * Unique, begins with "prcl_"
     * @var string
     */
    protected $id;

    /**
     * "Parcel"
     * @var string
     */
    protected $object;

    /**
     * "test" or "production"
     * @var string
     */
    protected $mode;

    /**
     * Inches
     * Required if predefined_package is empty
     * @var float
     */
    protected $length;

    /**
     * Inches
     * Required if predefined_package is empty
     * @var float
     */
    protected $width;

    /**
     * Inches
     * Required if predefined_package is empty
     * @var float
     */
    protected $height;

    /**
     * @var string|null
     */
    protected $predefined_package;

    /**
     * Ounces. Always required
     * @var float
     */
    protected $weight;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $updated_at;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->object                   = AU::get($data['object']);
        $this->length                   = AU::get($data['length']);
        $this->width                    = AU::get($data['width']);
        $this->height                   = AU::get($data['height']);
        $this->predefined_package       = AU::get($data['predefined_package']);
        $this->weight                   = AU::get($data['weight']);
        $this->created_at               = AU::get($data['created_at']);
        $this->updated_at               = AU::get($data['updated_at']);
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
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return null|string
     */
    public function getPredefinedPackage()
    {
        return $this->predefined_package;
    }

    /**
     * @param null|string $predefined_package
     */
    public function setPredefinedPackage($predefined_package)
    {
        $this->predefined_package = $predefined_package;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

}