<?php

namespace jamesvweston\EasyPost\EasyPost\Api;


use jamesvweston\EasyPost\EasyPost\Models\Requests\CreateEasyPostOrder;
use jamesvweston\EasyPost\EasyPost\Models\Responses\EasyPostOrder;

class OrderApi extends BaseApi
{

    /**
     * @var string
     */
    protected $path = '/orders';


    /**
     * @see https://www.easypost.com/docs/api.html#retrieve-an-order
     * @param   string  $id
     * @return  EasyPostOrder
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id);
        return new EasyPostOrder($response);
    }

    /**
     * @see https://www.easypost.com/docs/api.html#create-an-order
     * @param   CreateEasyPostOrder|array     $request
     * @return  EasyPostOrder
     */
    public function create ($request = [])
    {
        $request                        = $request instanceof CreateEasyPostOrder ? $request : new CreateEasyPostOrder($request);
        $response                       = parent::makeHttpRequest('post', $this->path, $request->jsonSerialize());

        return new EasyPostOrder($response);
    }

    /**
     * @see https://www.easypost.com/docs/api.html#buy-an-order
     * @param   string  $id
     * @param   string  $carrier
     * @param   string  $service
     * @return  EasyPostOrder
     */
    public function buy ($id, $carrier, $service)
    {
        $request                        = [
            'carrier'                   => $carrier,
            'service'                   => $service,
        ];

        $response                       = parent::makeHttpRequest('post', $this->path . '/' . $id . '/buy', $request);
        return new EasyPostOrder($response);
    }

}