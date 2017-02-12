<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Requests;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;

class GetEasyPostShipments implements \JsonSerializable
{

    use SimpleSerialize;

    /**
     * Optional pagination parameter.
     * Only shipments created before the given ID will be included. May not be used with after_id
     * @var	string|null
     */
    protected $before_id;

    /**
     * Optional pagination parameter.
     * Only shipments created after the given ID will be included. May not be used with before_id
     * @var	string|null
     */
    protected $after_id;

    /**
     * Only return Shipments created after this timestamp.
     * Defaults to 1 month ago, or 1 month before a passed end_datetime
     * @var	string|null
     */
    protected $start_datetime;

    /**
     * Only return Shipments created before this timestamp.
     * Defaults to end of the current day, or 1 month after a passed start_datetime
     * @var	string|null
     */
    protected $end_datetime;

    /**
     * The number of Shipments to return on each page. The maximum value is 100
     * @var	int|null
     */
    protected $page_size;

    /**
     * Only include Shipments that have been purchased. Default is true
     * @var	bool
     */
    protected $purchased;

    /**
     * Also include Shipments created by Child Users. Defaults to false
     * @var	bool
     */
    protected $include_children;


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->simpleSerialize();
    }

    /**
     * @return null|string
     */
    public function getBeforeId()
    {
        return $this->before_id;
    }

    /**
     * @param null|string $before_id
     */
    public function setBeforeId($before_id)
    {
        $this->before_id = $before_id;
    }

    /**
     * @return null|string
     */
    public function getAfterId()
    {
        return $this->after_id;
    }

    /**
     * @param null|string $after_id
     */
    public function setAfterId($after_id)
    {
        $this->after_id = $after_id;
    }

    /**
     * @return null|string
     */
    public function getStartDatetime()
    {
        return $this->start_datetime;
    }

    /**
     * @param null|string $start_datetime
     */
    public function setStartDatetime($start_datetime)
    {
        $this->start_datetime = $start_datetime;
    }

    /**
     * @return null|string
     */
    public function getEndDatetime()
    {
        return $this->end_datetime;
    }

    /**
     * @param null|string $end_datetime
     */
    public function setEndDatetime($end_datetime)
    {
        $this->end_datetime = $end_datetime;
    }

    /**
     * @return int|null
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * @param int|null $page_size
     */
    public function setPageSize($page_size)
    {
        $this->page_size = $page_size;
    }

    /**
     * @return boolean
     */
    public function isPurchased()
    {
        return $this->purchased;
    }

    /**
     * @param boolean $purchased
     */
    public function setPurchased($purchased)
    {
        $this->purchased = $purchased;
    }

    /**
     * @return boolean
     */
    public function isIncludeChildren()
    {
        return $this->include_children;
    }

    /**
     * @param boolean $include_children
     */
    public function setIncludeChildren($include_children)
    {
        $this->include_children = $include_children;
    }

}