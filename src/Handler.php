<?php

namespace TMogdans\JsonApiProblemResponder;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;
use TMogdans\JsonApiProblemResponder\Exceptions\BaseException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception): JsonResponse
    {
        $data = $this->getExceptionDefaults($exception);

        if ($exception instanceof BaseException) {
            $data = $exception->toArray();
        }

        return new JsonResponse($data, $data['status'], ['Content-Type' => 'application/problem+json']);
    }

    protected function getExceptionDefaults(Throwable $exception): array
    {
        return [
            'status' => 500,
            'title' => 'Uncaught Error',
            'detail' => $exception->getMessage(),
            'type' => 'https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html'
        ];
    }
}
