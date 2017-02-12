<?php

namespace jamesvweston\EasyPost\EasyPost\Exceptions;


class EasyPostInvalidAddressException extends EasyPostApiException
{

    public function __construct($message = 'Invalid address', $code = 404, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}