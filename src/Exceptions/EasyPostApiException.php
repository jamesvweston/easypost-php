<?php

namespace jamesvweston\EasyPost\EasyPost\Exceptions;


class EasyPostApiException extends \Exception
{

    public function __construct($message, $code = 403, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}