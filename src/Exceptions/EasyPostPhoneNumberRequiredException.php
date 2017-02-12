<?php
/**
 * Created by IntelliJ IDEA.
 * User: jamesweston
 * Date: 12/30/16
 * Time: 12:06 AM
 */

namespace jamesvweston\EasyPost\Exceptions;


class EasyPostPhoneNumberRequiredException extends EasyPostApiException
{

    public function __construct($message = 'Phone number is required', $code = 400, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}