<?php

namespace jamesvweston\EasyPost\Exceptions;


class EasyPostUnableToVoidShippedOrderException extends EasyPostApiException
{

    public function __construct($message, $code = 422, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}