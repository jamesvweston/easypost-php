<?php

namespace jamesvweston\EasyPost\EasyPost\Exceptions;


class EasyPostReferenceRequiredException extends EasyPostApiException
{

    public function __construct($message = 'Reference field is required', $code = 400, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}