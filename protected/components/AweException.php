<?php

class AweException extends Exception {

    public function __construct($message = null, $httpStatusCode = 0, $errorCode = 0) {

//if the first parameter is numeric, the user is trying to send HTTP Status Code only
        if ($httpStatusCode === 0 && $errorCode === 0 && is_integer($message)) {
            $httpStatusCode = $message;
            $message = self::getDefinitionFromCode($httpStatusCode);
            if ($message === null)
                $message = 'Unknown HTTP Exception';
        }

        //if no parameters are sent at all
        if ($httpStatusCode === 0 && $errorCode === 0 && $message === null) {
            $httpStatusCode = 500;
        }

        //if we don't have message
        if (!$message) {
            $message = self::getDefinitionFromCode($httpStatusCode);
        }

        //set HTTP Status Code to 500, if nothing is sent
        if ($httpStatusCode === 0)
            $httpStatusCode = 500;
        //and then process it
        $this->processHttpStatusCode($httpStatusCode);

        //if error code isn't passed, use HTTP status code
        if ($errorCode === 0)
            $errorCode = $httpStatusCode;

        if ($message)
            $message = 'Error ' . $errorCode . ' : ' . $message;
        
        parent::__construct($message, (int) $errorCode);
    }

    public static function processHttpStatusCode($httpStatusCode) {
        header('HTTP/1.1 ' . $httpStatusCode . ' ' . self::getDefinitionFromCode($httpStatusCode));
    }

    public static function getDefinitionFromCode($code) {
//http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
//http://en.wikipedia.org/wiki/List_of_HTTP_status_codes
        $definitions = array(
            '100' => 'Continue',
            '101' => 'Switching Protocols',
            '102' => 'Processing',
            '200' => 'OK',
            '201' => 'Created',
            '202' => 'Accepted',
            '203' => 'Non-Authoritative Information',
            '204' => 'No Content',
            '205' => 'Reset Content',
            '206' => 'Partial Content',
            '300' => 'Multiple Choices',
            '301' => 'Moved Permamnently',
            '302' => 'Found', //Use for temporary redirection
            '303' => 'See Other',
            '304' => 'Not Modified',
            '204' => 'No Response',
            '400' => 'Bad Request',
            '401' => 'Unauthorized',
            '402' => 'Payment Required',
            '403' => 'Forbidden',
            '404' => 'Not Found',
            '405' => 'Method Not Allowed',
            '405' => 'Not Acceptable',
            '405' => 'Proxy Authentication Required',
            '405' => 'Request Timeout',
            '405' => 'Conflict',
            '410' => 'Gone',
            '413' => 'Request Entity Too Large',
            '415' => 'Unsupported Media Type',
            '417' => 'Expectation Failed',
            '429' => 'Too Many Requests',
            '500' => 'Internal Server Error',
            '501' => 'Not Implemented',
            '502' => 'Bad Gateway',
            '503' => 'Service Unavailable',
            '504' => 'Gateway Timeout',
            '504' => 'HTTP Version Not Supported',
        );
        return isset($definitions[$code]) ? $definitions[$code] : null;
    }

}