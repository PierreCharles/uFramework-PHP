<?php

namespace Http;

use Negotiation\Negotiator;

class Request
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    private $method;
    private $uri;
    private $parameters;

    public function __construct(array $query = array(), array $request = array())
    {
        $this->method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : self::GET;
        $this->uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
        if ($pos = strpos($this->uri, '?')) {
            $this->uri = substr($this->uri, 0, $pos);
        }
        $this->parameters = array_merge($query, $request);
    }
    public function getMethod()
    {
        if ($this->method === self::POST) {
            return $this->getParameter('_method', self::POST);
        }

        return $this->method;
    }
    public function getUri()
    {
        return $this->uri;
    }
    public static function createFromGlobals()
    {
        if (isset($_SERVER['CONTENT_TYPE']) && isset($_SERVER['HTTP_CONTENT_TYPE'])) {
            if ('application/json' === $_SERVER['CONTENT_TYPE'] || 'application/json' === $_SERVER['HTTP_CONTENT_TYPE']) {
                $data = file_get_contents('php://input');
                $request = @json_decode($data, true);

                return new self($_GET, $request);
            }
        }

        return new self($_GET, $_POST);
    }
    public function getParameter($name, $default = null)
    {
        return $this->parameters[$name] ?? $default;
    }

    public function guessBestFormat()
    {
        $negotiator = new Negotiator();
        $acceptHeader = $_SERVER['HTTP_ACCEPT'];
        $priorities = array('text/html;charset=UTF-8', 'application/json');
        $value = $negotiator->getBest($acceptHeader, $priorities)->getValue();
        switch ($value) {
            case 'application/json':
                return 'json';
                break;
            case 'text/html':
                return 'html';
                break;
        }
    }
}
