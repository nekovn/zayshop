<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
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
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * Render the given HttpException.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderHttpException(HttpExceptionInterface $e)
    {
        $this->registerErrorViewPaths(); //dk view path . errors/ (di chung voi: $this->getExceptionView($e) );
        $status = $e->getStatusCode();
        if (view()->exists($view = "admin.errors.common")) {
            if ($status != Response::HTTP_NOT_FOUND) {
                $blade ="admin.errors.common";
            } else {
                //return vao file errors/404.balde.php
                $blade = $this->getHttpExceptionView($e);
            }

            if (view()->exists($view = $blade)) {
                return response()->view($view, [
                    'exception' => $e,
                    'message' => config('app.debug') && !empty($e->getMessage()) ? $e->getMessage() : Lang::get('messages.E.system.ms'),
                    'sub_message' => Lang::get('messages.E.system.sub.ms'),
                    'status_code' => $status,
                ], $status, $e->getHeaders());
            }
        }

        return $this->convertExceptionToResponse($e);
    }

    /**
     * Convert the given exception to an array.
     *
     * @param  \Throwable  $e
     * @return array
     */
    protected function convertExceptionToArray(Throwable $e)
    {
        //get_class : lay ten class bi exception
        //getFile : lay ten file bi exception
        //getLine : lay so dong bi exception
        //getTrace() : lay all file,function name, args
        //    collect([1, 2, 3])->all();
        //   output: [1, 2, 3]

        return config('app.debug') ? [
            'message' => $e->getMessage(),
            'exception' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => collect($e->getTrace())->map(function ($trace) {
                //duyet cac phan tu trong mang va loai ra phan tu args
                //tra ve mang moi ko co phan tu args
                return Arr::except($trace, ['args']);
            })->all(),
        ] : [
            'message' => Lang::get('messages.E.system.ms'),
        ];

    }

    /**
     * 認証失敗の時、元画面へ戻る
     * @param $request
     * @param AuthenticationException $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return \response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $guard = Arr::get($exception->guards(), 0);

        switch ($guard) {
            case 'admin':
                $login = 'admin.login';
                break;
            default:
                $login = 'client.login';
                break;
        }

        return redirect()->guest(route($login));
    }

}
