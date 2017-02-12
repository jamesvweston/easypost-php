<?php

namespace jamesvweston\EasyPost\Api;


use jamesvweston\EasyPost\EasyPostConfiguration;
use jamesvweston\EasyPost\Exceptions\EasyPostApiException;
use jamesvweston\EasyPost\Exceptions\EasyPostCustomsInfoException;
use jamesvweston\EasyPost\Exceptions\EasyPostInvalidAddressException;
use jamesvweston\EasyPost\Exceptions\EasyPostInvalidCredentialsException;
use jamesvweston\EasyPost\Exceptions\EasyPostPhoneNumberRequiredException;
use jamesvweston\EasyPost\Exceptions\EasyPostReferenceRequiredException;
use jamesvweston\EasyPost\Exceptions\EasyPostServiceUnavailableException;
use jamesvweston\EasyPost\Exceptions\EasyPostUnableToVoidShippedOrderException;
use jamesvweston\EasyPost\Exceptions\EasyPostUserThrottledException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

/**
 * Class BaseApi
 * @package jamesvweston\EasyPost\Api
 */
class BaseApi
{

    /**
     * @var EasyPostConfiguration
     */
    protected $config;

    /**
     * @var Client
     */
    protected $guzzle;


    public function __construct(EasyPostConfiguration $config)
    {
        $this->config                   = $config;
        $this->guzzle                   = new Client();
    }




    /**
     * @param   string      $method
     * @param   string      $path
     * @param   array|null  $apiRequest
     * @param   array|null  $queryString
     * @return  array
     *
     * @throws  EasyPostInvalidCredentialsException
     * @throws  EasyPostServiceUnavailableException
     * @throws  EasyPostPhoneNumberRequiredException
     * @throws  EasyPostCustomsInfoException
     * @throws  EasyPostReferenceRequiredException
     * @throws  EasyPostInvalidAddressException
     * @throws  EasyPostUserThrottledException
     * @throws  EasyPostUnableToVoidShippedOrderException
     * @throws  EasyPostApiException
     */
    protected function makeHttpRequest($method, $path, $apiRequest = null, $queryString = null)
    {
        $url                            = $this->config->getUrl() . $path;

        $data       = [
            'headers'               => [
                'Authorization'     => 'Bearer ' . $this->config->getApiKey(),
            ],
            'json'                  => $apiRequest,
            'query'                 => $queryString,
        ];

        try
        {
            switch ($method)
            {
                case 'post':
                    $response       = $this->guzzle->post($url, $data);
                    break;
                case 'put':
                    $response       = $this->guzzle->put($url, $data);
                    break;
                case 'delete':
                    $response       = $this->guzzle->delete($url, $data);
                    break;
                case 'get':
                    $response       = $this->guzzle->get($url, $data);
                    break;
                default:
                    return null;
            }
        }
        catch (\Exception $exception)
        {
            $mappedException    = $this->mapException($exception);
            throw $mappedException;
        }

        $result                 = $response->getBody()->getContents();
        $result                 = json_decode($result, true);

        return $result;
    }


    /**
     * code	    reason-phrase	        description
     * 200	    OK	                    The request was successful
     * 201	    Created	                The request was successful and one or more resources was created
     * 400	    Bad Request	            Request not processed due to client error
     * 401	    Unauthorized	        Authentication is required and has failed
     * 402	    Payment Required	    Lack of billing information or insufficient funds
     * 404	    Not Found	            The requested resource could not be found
     * 422	    Unprocessable Entity	The request was well-formed but unable to process the contained instructions
     */

    /**
     * @param   ClientException|ServerException|\Exception     $exception
     * @return  EasyPostInvalidCredentialsException
     * @return  EasyPostInvalidCredentialsException
     * @return  EasyPostServiceUnavailableException
     * @return  EasyPostPhoneNumberRequiredException
     * @return  EasyPostCustomsInfoException
     * @return  EasyPostReferenceRequiredException
     * @return  EasyPostInvalidAddressException
     * @return  EasyPostUserThrottledException
     * @return  EasyPostUnableToVoidShippedOrderException
     * @return  EasyPostApiException
     */
    protected function mapException ($exception)
    {
        $mappedException        = null;

        $code                   = $exception->getCode();
        $errorMessage           = json_decode($exception->getResponse()->getBody()->getContents(), true);
        $errorMessage           = isset($errorMessage['error']) ? $errorMessage['error'] : null;
        $message                = isset($errorMessage['message']) ? $errorMessage['message'] : null;

        if ($exception instanceof ClientException)
        {
            if ($code == 401)
                $mappedException = new EasyPostInvalidCredentialsException();
            else if (
                preg_match("/phoneNumber is required/", $message) ||
                preg_match("/Missing or invalid ship to phone number/", $message) ||
                preg_match("/RequestedShipment Recipient contact - phoneNumber is required/", $message))
                $mappedException = new EasyPostPhoneNumberRequiredException();
            else if (preg_match("/'customs_info' is required for international shipments, shipments bound for US military bases, or US territories/", $message))
                $mappedException = new EasyPostCustomsInfoException();
            else if (preg_match("/Missing required shipment attribute: reference/", $message))
            {
                $mappedException = new EasyPostReferenceRequiredException();
            }
            else if (preg_match("/Address is too ambiguous/", $message))
                $mappedException = new EasyPostInvalidAddressException();
            else if (preg_match("/The maximum number of user access attempts was exceeded/", $message) ||
                preg_match("/The UserId is currently locked out/", $message))
                $mappedException = new EasyPostUserThrottledException($message, $code);
            else if (preg_match("/Unable to request refund. The parcel has been shipped/", $message))
                $mappedException = new EasyPostUnableToVoidShippedOrderException($message);
        }
        else if ($exception instanceof ServerException)
        {
            if (preg_match("/carrier is not responding/", $message))
                $mappedException = new EasyPostServiceUnavailableException('The carrier API is not responding');
        }



        if (is_null($mappedException))
            $mappedException    = new EasyPostApiException($errorMessage, $code);

        return $mappedException;
    }
}