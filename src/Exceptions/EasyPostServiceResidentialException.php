<?php

namespace jamesvweston\EasyPost\Exceptions;


class EasyPostServiceResidentialException extends EasyPostApiException
{

    public function __construct($message = 'The selected service is not available to residential destinations', $code = 400, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}