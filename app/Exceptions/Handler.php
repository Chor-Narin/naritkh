<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{


    public function render($request, Throwable $exception)
{
    if ($request->expectsJson()) {

        $status = 500;
        $message = $exception->getMessage();

        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            $status = 404;
            $message = 'Resource not found.';
        }

        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            $status = 422;
            $message = $exception->errors();
        }

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            $status = 404;
            $message = 'API endpoint not found.';
        }

        return response()->json([
            'success' => false,
            'message' => $message,
            'status_code' => $status
        ], $status);
    }

    return parent::render($request, $exception);
}

}
