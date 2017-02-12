<?php

namespace jamesvweston\EasyPost\EasyPost\Exceptions;


class EasyPostCustomsInfoException extends EasyPostApiException
{

    public function __construct($message = 'Customs info is required', $code = 400, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}