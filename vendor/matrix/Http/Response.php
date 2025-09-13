<?php 

declare(strict_types=1);

namespace Matrix\Http;

class Response
{
    public const HTTP_OK = 200;
    public const HTTP_BAD_REQUEST = 400;
    public const HTTP_FORBIDDEN = 403;
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_INTERNAL = 500;

    private static $statusTexts = [
        200 => "OK",
        400 => "Bad Request",
        403 => "Forbidden",
        404 => "Not Found",
        500 => "Internal Error",
    ];

    private static $defaultHeaders = [
        'Content-Type' => "text/html; charset=UTF-8",
    ];

    private int $statusCode;

    private array $headers;

    private string $body;

    /**
     * Build parts for Response
     *
     * @param string $body HTML body
     * @param int $status
     * @param array $headers List of headers
     */
    function __construct(string $body, int $status = self::HTTP_OK, array $headers = [])
    {
        $this->body = $body;
        $this->statusCode = $status;
        $this->headers = empty($headers) ? static::$defaultHeaders : $headers;
    }

    public function addHeaders(array $headers): void
    {
        $this->headers = array_merge($this->headers, $headers);
    }

    /** 
     * Send headers and write body
     */
    public function send(): void
    {
        foreach ($this->headers as $name => $value) {
            // In case of 'content-type' added in lowercase and duplicate entry in headers
            $replace = 0 === strcasecmp($name, 'Content-Type');
            header($name.': '.$value, $replace, $this->statusCode);
        }

        header(sprintf('HTTP/1.1 %s %s', $this->statusCode, self::$statusTexts[$this->statusCode]), true, $this->statusCode);

        echo $this->body;
    }
}
