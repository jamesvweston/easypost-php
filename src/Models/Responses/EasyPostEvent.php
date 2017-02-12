<?php

namespace jamesvweston\EasyPost\EasyPost\Models\Responses;


use jamesvweston\EasyPost\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#events
 * Class Event
 * @package jamesvweston\EasyPost\EasyPost\Models\Responses
 */
class EasyPostEvent
{

    use SimpleSerialize;

    /**
     * Unique identifier, begins with "evt_"
     * @var	string
     */
    protected $id;

    /**
     * "Event"
     * @var	string
     */
    protected $object;

    /**
     * "test" or "production"
     * @var	string
     */
    protected $mode;

    /**
     * Result type and event name, see the "Possible Event Types" section for more information
     * @var	string
     */
    protected $description;

    /**
     * Previous values of relevant result attributes
     * @var	array
     */
    protected $previous_attributes;

    /**
     * The object associated with the Event. See the "object" attribute on the result to determine its specific type
     * @var	array
     */
    protected $result;

    /**
     * The current status of the event.
     * Possible values are "completed", "failed", "in_queue", "retrying", or "pending" (deprecated)
     * @var	string
     */
    protected $status;

    /**
     * Webhook URLs that have not yet been successfully notified as of the time this webhook event was sent.
     * The URL receiving the Event will still be listed in pending_urls, as will any other URLs that receive the Event at the same time
     * @var	string[]
     */
    protected $pending_urls;

    /**
     * Webhook URLs that have already been successfully notified as of the time this webhook was sent
     * @var	string[]
     */
    protected $completed_urls;

    /**
     * @var	string
     */
    protected $created_at;

    /**
     * @var	string
     */
    protected $updated_at;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->object                   = AU::get($data['object']);
        $this->mode                     = AU::get($data['mode']);
        $this->description              = AU::get($data['description']);
        $this->previous_attributes      = AU::get($data['previous_attributes']);
        $this->result                   = AU::get($data['result']);
        $this->status                   = AU::get($data['status']);
        $this->pending_urls             = AU::get($data['pending_urls'], []);
        $this->completed_urls           = AU::get($data['completed_urls'], []);
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

}