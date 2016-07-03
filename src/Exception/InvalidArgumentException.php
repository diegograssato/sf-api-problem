<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */
namespace DTUX\ApiProblem\Exception;

use Exception;

class InvalidArgumentException extends ApiException
{
    public function __construct($status = null, $detail = null, $type = null, $title = null, Exception $previous = null, $additional)
    {
        if (empty($detail)) {
            $detail = 'The arguments listed below are invalid.';
        }

        if (empty($title)) {
            $title = 'Invalid argument exception.';
        }

        if (empty($status)) {
            $status = 400;
        }

        parent::__construct($status, $detail, $status, $title, $previous, $additional);
    }
}
