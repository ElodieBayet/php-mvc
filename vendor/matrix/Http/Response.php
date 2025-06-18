<?php 

declare(strict_types=1);

namespace Matrix\Http;

class Response
{
    public const HTTP_OK = 200;
    public const HTTP_BAD_REQUEST = 400;
    public const HTTP_FORBIDDEN = 403;
    public const HTTP_NOT_FOUND = 404;

    private static $statusTexts = [
        200 => "OK",
        400 => "Bad Request",
        403 => "Forbidden",
        404 => "Not Found",
    ];

    private static $defaultHeaders = [
        'Content-Type' => [
            "text/html;", 
            "charset=UTF-8",
        ],
    ];

    /** @var int $statusCode */
    private $statusCode;

    /** @var array $headers */
    private $headers;

    /** @var string $body */
    private $body;

    /**
     * Build parts for Response
     *
     * @param array $headers List of headers
     * @param string $body HTML body
     */
    function __construct(string $body, int $status = self::HTTP_OK, array $headers = [])
    {
        $this->body = $body;
        $this->statusCode = $status;
        $this->addHeaders($headers);
    }

    private function addHeaders(array $headers): void
    {
        $this->headers = self::$defaultHeaders;
        if (!empty($headers)) {
            $this->headers = [...$this->headers, ...$headers];
        }
    }

    /** 
     * Send headers and write body
     */
    public function send(): void
    {
        foreach ($this->headers as $name => $values) {
            $replace = 0 === strcasecmp($name, 'Content-Type');
            foreach ($values as $value) {
                header($name.': '.$value, $replace, $this->statusCode);
            }
        }

        header(sprintf('HTTP/1.1 %s %s', $this->statusCode, self::$statusTexts[$this->statusCode]), true, $this->statusCode);

        echo $this->body;
    }
}
