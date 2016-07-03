<?php

namespace DTUX\ApiProblem\Exception;

use Exception;
use Psr\Log\LogLevel;

/**
 * Exception thrown when the action can not deserialize the request, likely to be poorly formatted.
 */
class BadFormattedRequisitionException extends ApiException
{
    public function __construct($status = null, $detail = null, $type = null, $title = null, Exception $previous = null, $additional)
    {
        if (empty($detail)) {
            $detail = 'The arguments of the request are poorly formatted and / or invalid. See the documentation.';
        }

        if (empty($title)) {
            $title = 'Invalid argument exception.';
        }

        if (empty($status)) {
            $status = 400;
        }

        parent::__construct($status, $detail, LogLevel::ERROR, $title, $previous, $additional);
    }
}
