<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */
namespace DTUX\ApiProblem;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ApiProblemResponse.
 */
class ApiProblemResponse extends JsonResponse
{
    /**
     * @param ApiProblem $apiProblem
     */
    public function __construct(ApiProblem $apiProblem)
    {
        parent::__construct($apiProblem->toArray(), $apiProblem->status);
    }
}
