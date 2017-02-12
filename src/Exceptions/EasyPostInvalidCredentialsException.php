<?php

namespace jamesvweston\EasyPost\Exceptions;


class EasyPostInvalidCredentialsException extends EasyPostApiException
{

    public function __construct($message = 'Invalid EasyPost credentials', $code = 403, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}