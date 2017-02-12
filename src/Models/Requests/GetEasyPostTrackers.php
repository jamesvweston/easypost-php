<?php

namespace jamesvweston\EasyPost\Models\Requests;
use jamesvweston\EasyPost\Traits\SimpleSerialize;


/**
 * @see https://www.easypost.com/docs/api.html#retrieve-a-list-of-a-trackers
 * Class GetEasyPostTrackers
 * @package jamesvweston\EasyPost\Models\Requests
 */
class GetEasyPostTrackers implements \JsonSerializable
{

    use SimpleSerialize;

    /**
     * Optional pagination parameter. Only trackers created before the given ID will be included. May not be used with after_id
     * @var string
     */
    protected $before_id;

    /**
     * Optional pagination parameter. Only trackers created after the given ID will be included. May not be used with before_id
     * @var string
     */
    protected $after_id;

    /**
     * Only Return Trackers created after this timestamp. Defaults to 1 month ago, or 1 month before a passed end_datetime
     * @var string
     */
    protected $start_datetime;

    /**
     * Only return Trackers created before this timestamp. Defaults to end of the current day, or 1 month after a passed start_datetime
     * @var string
     */
    protected $end_datetime;

    /**
     * The number of Trackers to return on each page. The maximum value is 100
     * @var string
     */
    protected $page_size;

    /**
     * Only returns Trackers with the given tracking_code. Useful for retrieving an individual Tracker by tracking_code rather than by ID
     * @var string
     */
    protected $tracking_code;

    /**
     * Only returns Trackers with the given carrier value
     * @var string
     */
    protected $carrier;


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
    public function getBeforeId()
    {
        return $this->before_id;
    }

    /**
     * @param string $before_id
     */
    public function setBeforeId($before_id)
    {
        $this->before_id = $before_id;
    }

    /**
     * @return string
     */
    public function getAfterId()
    {
        return $this->after_id;
    }

    /**
     * @param string $after_id
     */
    public function setAfterId($after_id)
    {
        $this->after_id = $after_id;
    }

    /**
     * @return string
     */
    public function getStartDatetime()
    {
        return $this->start_datetime;
    }

    /**
     * @param string $start_datetime
     */
    public function setStartDatetime($start_datetime)
    {
        $this->start_datetime = $start_datetime;
    }

    /**
     * @return string
     */
    public function getEndDatetime()
    {
        return $this->end_datetime;
    }

    /**
     * @param string $end_datetime
     */
    public function setEndDatetime($end_datetime)
    {
        $this->end_datetime = $end_datetime;
    }

    /**
     * @return string
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * @param string $page_size
     */
    public function setPageSize($page_size)
    {
        $this->page_size = $page_size;
    }

    /**
     * @return string
     */
    public function getTrackingCode()
    {
        return $this->tracking_code;
    }

    /**
     * @param string $tracking_code
     */
    public function setTrackingCode($tracking_code)
    {
        $this->tracking_code = $tracking_code;
    }

    /**
     * @return string
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param string $carrier
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

}