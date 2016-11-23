<?php

namespace App\Exceptions;


use App\Helper\ApiResponse;
use Dingo\Api\Routing\Helpers;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class Handler
 *
 * @property \Illuminate\Http\Response|\Dingo\Api\Http\Response|\Dingo\Api\Http\Response\Factory response
 * @package App\Exceptions
 */
class Handler extends ExceptionHandler
{
    use Helpers;
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
     * @param  \Exception $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception               $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($request->wantsJson())
        {
            $response = parent::render($request, $e);
            $error = new ApiResponse(false, null, [ 'error' => true,'httpCode' => $response->getStatusCode(),'code' => $e->getCode(), 'message' => $e->getMessage() ]);
            return response()->json($error, $response->getStatusCode());
        }

        return parent::render($request, $e);
    }
}
