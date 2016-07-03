<?php

namespace DTUX\ApiProblem\Exception;

use Exception;

/**
 * Exception thrown when an unexpected error during execution of the request occurs.
 */
class InternalErroException extends ApiException
{
    public function __construct($status = null, $detail = null, $type = null, $title = null, Exception $previous = null, $additional)
    {
        if (empty($detail)) {
            $detail = 'Sorry, an internal error occurred.';
        }

        if (empty($status)) {
            $status = 500;
        }

        parent::__construct($status, $detail, $status, $title, $previous, $additional);
    }
}
