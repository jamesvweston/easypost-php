<?php

namespace jamesvweston\EasyPost\Api;


use jamesvweston\EasyPost\Models\Requests\CreateEasyPostTracker;
use jamesvweston\EasyPost\Models\Requests\GetEasyPostTrackers;
use jamesvweston\EasyPost\Models\Responses\EasyPostTracker;
use jamesvweston\Utilities\ArrayUtil AS AU;

class TrackerApi extends BaseApi
{

    /**
     * @var string
     */
    protected $path = '/trackers';


    /**
     * @see https://www.easypost.com/docs/api.html#retrieve-a-list-of-a-trackers
     * @param   GetEasyPostTrackers|array     $request
     * @return  EasyPostTracker[]
     * @see https://www.easypost.com/docs/api.html#retrieve-a-list-of-a-trackers
     */
    public function get ($request = [])
    {
        $request                        = $request instanceof GetEasyPostTrackers ? $request : new GetEasyPostTrackers($request);
        $response                       = parent::makeHttpRequest('get', $this->path, null, $request->jsonSerialize());
        $items                          = AU::get($response['trackers'], []);

        $result                         = [];
        foreach ($items AS $shipment)
        {
            $result[]                   = new EasyPostTracker($shipment);
        }

        return $result;
    }

    /**
     * @see https://www.easypost.com/docs/api.html#retrieve-a-tracker
     * @param   string  $id
     * @return  EasyPostTracker
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id);
        return new EasyPostTracker($response);
    }

    /**
     * @see https://www.easypost.com/docs/api.html#create-a-tracker
     * @param   CreateEasyPostTracker|array     $request
     * @return  EasyPostTracker
     */
    public function create ($request = [])
    {
        $request                        = $request instanceof CreateEasyPostTracker ? $request : new CreateEasyPostTracker($request);
        $response                       = parent::makeHttpRequest('post', $this->path, $request->jsonSerialize());

        return new EasyPostTracker($response);
    }

}