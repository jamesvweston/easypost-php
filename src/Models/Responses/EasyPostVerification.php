<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#addresses
 * Class Verification
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostVerification
{

    use SimpleSerialize;

    /**
     * The success of the verification
     * @var bool
     */
    protected $success;

    /**
     * All errors that caused the verification to fail
     * @var EasyPostFieldError[]
     */
    protected $errors;

    /**
     * @var EasyPostVerificationDetails
     */
    protected $details;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->success                  = AU::get($data['success']);

        $this->errors                   = [];
        $errors                         = AU::get($data['errors'], []);
        foreach ($errors AS $item)
            $this->errors[]             = new EasyPostFieldError($item);

        $this->details                  = AU::get($data['details']);
        if (!is_null($this->details))
            $this->details              = new EasyPostVerificationDetails($this->details);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->simpleSerialize();
    }

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param boolean $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     * @return EasyPostFieldError[]
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param EasyPostFieldError[] $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return EasyPostVerificationDetails
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param EasyPostVerificationDetails $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

}