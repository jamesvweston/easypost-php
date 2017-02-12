<?php

namespace jamesvweston\EasyPost\EasyPost\Exceptions;


class EasyPostUserThrottledException extends EasyPostApiException
{

    public function __construct($message, $code, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}