<?php

namespace jamesvweston\EasyPost\EasyPost\Api;


use jamesvweston\EasyPost\EasyPost\Models\Requests\CreateEasyPostParcel;
use jamesvweston\EasyPost\EasyPost\Models\Responses\EasyPostParcel;


class ParcelApi extends BaseApi
{

    /**
     * @var string
     */
    protected $path = '/parcels';


    /**
     * @see https://www.easypost.com/docs/api.html#create-a-parcel
     * @param   CreateEasyPostParcel|array     $request
     * @return  EasyPostParcel
     */
    public function create ($request = [])
    {
        $request                        = $request instanceof CreateEasyPostParcel ? $request : new CreateEasyPostParcel($request);
        $response                       = parent::makeHttpRequest('post', $this->path, $request->jsonSerialize());

        return new EasyPostParcel($response);
    }

    /**
     * @see https://www.easypost.com/docs/api.html#retrieve-a-parcel
     * @param   string  $id
     * @return  EasyPostParcel
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id);
        return new EasyPostParcel($response);
    }

}