<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Validation\ValidationException;

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
        // 参数验证错误的异常，我们需要返回 400 的 http code 和一句错误信息
        if ($exception instanceof ValidationException) {
            return response(['error' => array_first(array_collapse($exception->errors()))], 400);
        }
        if ($exception instanceof UnauthorizedHttpException) {
            $preException = $exception->getPrevious();
            if ($preException instanceof
                \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['error' => 'TOKEN已过期！','code' => 406]);
            } else if ($preException instanceof
                \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['error' => 'TOKEN无效！','code' => 406]);
            } else if ($preException instanceof
                \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
                return response()->json(['error' => 'TOKEN已退出！','code' => 406]);
            }
            if ($exception->getMessage() === 'Token not provided') {
                return response()->json(['error' => 'Token为空！','code' => 406]);
            }
        }

        if ($exception instanceof
            \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
            return response()->json(['error' => 'TOKEN已过期！','code' => 406]);
        } else if ($exception instanceof
            \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
            return response()->json(['error' => 'TOKEN无效！','code' => 406]);
        } else if ($exception instanceof
            \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
            return response()->json(['error' => 'TOKEN已退出！','code' => 406]);
        }
        if ($exception->getMessage() === 'Token not provided') {
            return response()->json(['error' => 'Token为空！','code' => 406]);
        }

    }
}
