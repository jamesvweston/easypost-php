<?php

namespace jamesvweston\EasyPost\Exceptions;


class EasyPostShipmentWeightException extends EasyPostApiException
{

    public function __construct($message = 'Total commodities weight is greater than package or shipment weight', $code = 400, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}