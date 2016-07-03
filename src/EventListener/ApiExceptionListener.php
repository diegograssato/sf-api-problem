<?php

namespace DTUX\ApiProblem\EventListener;

use DTUX\ApiProblem\ApiProblem;
use DTUX\ApiProblem\ApiProblemResponse;
use DTUX\ApiProblem\Exception\ApiException;
use Exception;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\EventListener\ExceptionListener;

class ApiExceptionListener extends ExceptionListener
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    /**
     * @param GetResponseForExceptionEvent $event The event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        /*
         * @var ApiException
         */
        $exception = $event->getException();

        if (!$exception instanceof ApiException) {
            $apiProblem = new ApiProblem(
                $exception->getStatusCode(),
                $exception->getMessage(),
                LogLevel::ERROR
            );
        } else {
            $apiProblem = new ApiProblem(
                $exception->getStatus(),
                $exception->getDetail(),
                $exception->getType(),
                $exception->getTitle(),
                $exception->getAdditional()
            );
        }
        $this->logger($apiProblem);

        $apiProblemResponse = new ApiProblemResponse($apiProblem);
        $event->setResponse($apiProblemResponse);
    }

    /**
     * Register log.
     *
     * @param ApiProblem $exception
     */
    protected function logger(ApiProblem $exception)
    {
        call_user_func(
            array($this->logger, $exception->getType()),
            '[API] Exception: ', $exception->toArray()
        );
    }
}
