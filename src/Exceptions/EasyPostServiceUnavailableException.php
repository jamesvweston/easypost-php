<?php

namespace jamesvweston\EasyPost\Exceptions;


class EasyPostServiceUnavailableException extends EasyPostApiException
{


    public function __construct($message = 'EasyPost service is temporarily unavailable', $code = 503, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}