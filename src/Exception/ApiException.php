<?php

namespace DTUX\ApiProblem\Exception;

use Exception;
use RuntimeException;
use Psr\Log\LogLevel;

/**
 * Class that defines the basic behavior of the exceptions thrown by the API.
 */
abstract class ApiException extends RuntimeException
{
    protected $status;
    protected $detail;
    protected $type;
    protected $title;
    protected $additional = array();
    protected $logLevel;

    protected $previousException;

    /**
     * @param null|string $description
     * @param null|string $code
     * @param Exception   $previous
     * @param array       $details
     * @param int         $httpStatusCode
     * @param string      $logLevel
     */
    public function __construct($status = null, $detail = null, $type = null, $title = null, Exception $previous = null,  $additional = array())
    {
        $this->additional = $additional;
        $this->status = $status;
        $this->detail = $detail;
        $this->title = $title;
        $this->type = $type;
        $this->previousException = $previous;
    }

    /**
     * Detect has addictional items.
     *
     * @return bool
     */
    public function hasAdditional()
    {
        return !empty($this->additional);
    }

    /**
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param null $status
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param null $detail
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return array
     */
    public function getAdditional()
    {
        return $this->additional;
    }

    /**
     * @param array $additional
     */
    public function setAdditional($additional)
    {
        $this->additional = $additional;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogLevel()
    {
        return $this->logLevel;
    }

    /**
     * @param string $logLevel
     */
    public function setLogLevel($logLevel)
    {
        $this->logLevel = $logLevel;

        return $this;
    }

    /**
     * @return Exception
     */
    public function getPreviousException()
    {
        return $this->previousException;
    }

    /**
     * @param Exception $previousException
     */
    public function setPreviousException($previousException)
    {
        $this->previousException = $previousException;

        return $this;
    }
}
