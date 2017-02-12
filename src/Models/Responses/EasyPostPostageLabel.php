<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class EasyPostPostageLabel implements \JsonSerializable
{

    use SimpleSerialize;


    /**
     * Unique, begins with "pl_"
     * @var string
     */
    protected $id;

    /**
     * "PostageLabel"
     * @var string
     */
    protected $object;

    /**
     * @var int
     */
    protected $date_advance;

    /**
     * @var string
     */
    protected $integrated_form;

    /**
     * @var int
     */
    protected $label_resolution;

    /**
     * @var string
     */
    protected $label_size;

    /**
     * @var string
     */
    protected $label_type;

    /**
     * @var string
     */
    protected $label_file_type;

    /**
     * @var string
     */
    protected $label_url;

    /**
     * @var string|null
     */
    protected $label_pdf_url;

    /**
     * @var string|null
     */
    protected $label_zpl_url;

    /**
     * @var string|null
     */
    protected $label_epl2_url;

    /**
     * @var string|null
     */
    protected $label_file;

    /**
     * @var string
     */
    protected $label_date;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $updated_at;


    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->object                   = AU::get($data['object']);
        $this->date_advance             = AU::get($data['date_advance']);
        $this->integrated_form          = AU::get($data['integrated_form']);
        $this->label_resolution         = AU::get($data['label_resolution']);
        $this->label_size               = AU::get($data['label_size']);
        $this->label_type               = AU::get($data['label_type']);
        $this->label_file_type          = AU::get($data['label_file_type']);
        $this->label_url                = AU::get($data['label_url']);
        $this->label_pdf_url            = AU::get($data['label_pdf_url']);
        $this->label_zpl_url            = AU::get($data['label_zpl_url']);
        $this->label_epl2_url           = AU::get($data['label_epl2_url']);
        $this->label_file               = AU::get($data['label_file']);
        $this->label_date               = AU::get($data['label_date']);
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
     * @return int
     */
    public function getDateAdvance()
    {
        return $this->date_advance;
    }

    /**
     * @param int $date_advance
     */
    public function setDateAdvance($date_advance)
    {
        $this->date_advance = $date_advance;
    }

    /**
     * @return string
     */
    public function getIntegratedForm()
    {
        return $this->integrated_form;
    }

    /**
     * @param string $integrated_form
     */
    public function setIntegratedForm($integrated_form)
    {
        $this->integrated_form = $integrated_form;
    }

    /**
     * @return int
     */
    public function getLabelResolution()
    {
        return $this->label_resolution;
    }

    /**
     * @param int $label_resolution
     */
    public function setLabelResolution($label_resolution)
    {
        $this->label_resolution = $label_resolution;
    }

    /**
     * @return string
     */
    public function getLabelSize()
    {
        return $this->label_size;
    }

    /**
     * @param string $label_size
     */
    public function setLabelSize($label_size)
    {
        $this->label_size = $label_size;
    }

    /**
     * @return string
     */
    public function getLabelType()
    {
        return $this->label_type;
    }

    /**
     * @param string $label_type
     */
    public function setLabelType($label_type)
    {
        $this->label_type = $label_type;
    }

    /**
     * @return string
     */
    public function getLabelFileType()
    {
        return $this->label_file_type;
    }

    /**
     * @param string $label_file_type
     */
    public function setLabelFileType($label_file_type)
    {
        $this->label_file_type = $label_file_type;
    }

    /**
     * @return string
     */
    public function getLabelUrl()
    {
        return $this->label_url;
    }

    /**
     * @param string $label_url
     */
    public function setLabelUrl($label_url)
    {
        $this->label_url = $label_url;
    }

    /**
     * @return null|string
     */
    public function getLabelPdfUrl()
    {
        return $this->label_pdf_url;
    }

    /**
     * @param null|string $label_pdf_url
     */
    public function setLabelPdfUrl($label_pdf_url)
    {
        $this->label_pdf_url = $label_pdf_url;
    }

    /**
     * @return null|string
     */
    public function getLabelZplUrl()
    {
        return $this->label_zpl_url;
    }

    /**
     * @param null|string $label_zpl_url
     */
    public function setLabelZplUrl($label_zpl_url)
    {
        $this->label_zpl_url = $label_zpl_url;
    }

    /**
     * @return null|string
     */
    public function getLabelEpl2Url()
    {
        return $this->label_epl2_url;
    }

    /**
     * @param null|string $label_epl2_url
     */
    public function setLabelEpl2Url($label_epl2_url)
    {
        $this->label_epl2_url = $label_epl2_url;
    }

    /**
     * @return null|string
     */
    public function getLabelFile()
    {
        return $this->label_file;
    }

    /**
     * @param null|string $label_file
     */
    public function setLabelFile($label_file)
    {
        $this->label_file = $label_file;
    }

    /**
     * @return string
     */
    public function getLabelDate()
    {
        return $this->label_date;
    }

    /**
     * @param string $label_date
     */
    public function setLabelDate($label_date)
    {
        $this->label_date = $label_date;
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