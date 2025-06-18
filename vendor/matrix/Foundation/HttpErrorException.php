<?php

namespace Matrix\Foundation;

class HttpErrorException extends \Exception
{
    public const HTTP_BAD_REQUEST = 'badRequest';
    public const HTTP_NOT_FOUND = 'notFound';

    /** @var string $httpType */
    private $httpType;

    public function __construct(string $message, string $httpType, $code = 0)
    {
        $this->message = $message;
        $this->httpType = $httpType;

        parent::__construct($message, $code);
    }

    public function getHttpType(): string
    {
        return $this->httpType;
    }
}