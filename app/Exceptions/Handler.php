<?php

namespace App\Exceptions;

use App\Models\Log;
use ArgumentCountError;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Passport\Http\Middleware\CheckClientCredentials;
use ParseError;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {

        $this->reportable(function (Throwable $e) {
        });
    }

    public function render($request, Throwable $e)
    {
//        dd($request->method());
        if ($request->expectsJson()) {
            if ($e instanceof NotFoundHttpException) {
                $response = $this->HasStatusAndMessage($e);
            } elseif ($e instanceof AuthorizationException) {
                $response = $this->AuthenticationExceptionMessage($e);
            } elseif ($e instanceof MethodNotAllowedHttpException) {
                $response = $this->AuthenticationExceptionMessage($e);
            } elseif ($e instanceof AuthenticationException) {
                $response = $this->AuthenticationExceptionMessage($e);
            } elseif ($e instanceof ParseError) {
                $response = $this->ParseErrorMessage($e);
            } elseif ($e instanceof ArgumentCountError) {
                $response = $this->ArgumentCountErrorMessage($e);
            } elseif ($e instanceof CheckClientCredentials) {
                $response = $this->HasStatusAndMessage($e);
            } elseif (str_starts_with($e->getMessage(), 'Class') and str_ends_with($e->getMessage(), 'not found')) {
                $response = $this->CustomExceptionMessage(462);
            } elseif (str_starts_with($e->getMessage(), 'Target class') and str_ends_with($e->getMessage(), 'does not exist.')) {
                $response = $this->CustomExceptionMessage(463);
            } elseif (str_starts_with($e->getMessage(), 'Method') and str_ends_with($e->getMessage(), 'does not exist.')) {
                $response = $this->CustomExceptionMessage(464);
            } elseif (str_contains($e->getMessage(), 'No connection')) {
                $response = $this->CustomExceptionMessage(465);
                $this->create_file_log($response, $e, $request);
            } else {
                $response = $this->OtherExceptionMessage($e);
            }
            if (!str_contains($e->getMessage(), 'No connection')) {
                $this->create_db_log($response, $e, $request);
            }

            return $response;
        } else {
            return parent::render($request, $e);
        }
    }

    public function create_db_log($response, $e, $request)
    {
        Log::create([
            'status' => $response['status'],
            'front_message' => $response['message'],
            'back_message' => $e->getMessage(),
            'url' => $response['url'],
            'ip' => $request->ip(),
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'method' => $request->method(),
        ]);
    }

    public function create_file_log($response, $e, $request)
    {
        $data = ['status' => $response['status'],
            'front_message' => $response['message'],
            'back_message' => $e->getMessage(),
            'url' => $response['url'],
            'ip' => $request->ip(),
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'method' => $request->method()];
        \Log::channel('costume_error')->emergency($data);

    }

    /**
     * @return JsonResource
     */
    public function HasStatusAndMessage($e): JsonResource
    {

        return new JsonResource(
            [
                'status' => $e->getStatusCode(),
                'data' => [],
                'message' => 'not found',
                'url' => \request()->getUri()
            ]
        );

    }

    /**
     * @param AuthenticationException|Throwable $e
     * @return JsonResource
     */
    public function AuthenticationExceptionMessage(AuthenticationException|Throwable $e): JsonResource
    {
        return new JsonResource(
            [
                'status' => 403,
                'data' => [],
                'message' => $e->getMessage(),
                'url' => \request()->getUri()
            ]
        );

    }

    /**
     * @param Throwable|ArgumentCountError $e
     * @return JsonResource
     */
    public function ArgumentCountErrorMessage(Throwable|ArgumentCountError $e): JsonResource
    {
        return new JsonResource(
            [
                'status' => 461,
                'data' => [],
                'message' => \config('ErrorHandling.451'),
                'url' => \request()->getUri()
            ]
        );

    }

    /**
     * @param Throwable|ParseError $e
     * @return JsonResource
     */
    public function ParseErrorMessage(Throwable|ParseError $e): JsonResource
    {
        return new JsonResource(
            [
                'status' => 460,
                'data' => [],
                'message' => \config('ErrorHandling.450'),
                'url' => \request()->getUri()
            ]
        );

    }

    /**
     * @return JsonResource
     */
    public function CustomExceptionMessage($code): JsonResource
    {
        return new JsonResource(
            [
                'status' => $code,
                'data' => [],
                'message' => \config('ErrorHandling.' . $code),
                'url' => \request()->getUri()
            ]
        );

    }

    /**
     * @param Throwable $e
     * @return JsonResource
     */
    public function OtherExceptionMessage(Throwable $e): JsonResource
    {
        return new JsonResource(
            [
                'status' => '1000',
                'data' => [],
                'message' => $e->getMessage(),
                'url' => \request()->getUri()
            ]
        );

    }


}
