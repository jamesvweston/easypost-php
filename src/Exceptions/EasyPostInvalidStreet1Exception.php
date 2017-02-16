<?php

namespace jamesvweston\EasyPost\Exceptions;


class EasyPostInvalidStreet1Exception extends EasyPostApiException
{

    public function __construct($message = 'Invalid Recipient Street1', $code = 400, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}