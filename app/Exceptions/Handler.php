<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
            //
        });
    }

    // public function render($request, Throwable $e)
    // {
    //     // if( $request->is('api*')){
    //     //     if($e instanceof ValidationException){
    //     //         return response([
    //     //             'status' => 'errors',
    //     //             'error' => $e->errors()
    //     //         ], 422);
    //     //     }

    //     //     if($e instanceof AuthorizationException){
    //     //         return response([
    //     //             'status' => 'errors',
    //     //             'error' => $e->getMessage()
    //     //         ], 403);
    //     //     }

    //     //     if($e instanceof AuthenticationException){
    //     //         return response([
    //     //             'status' => 'errors',
    //     //             'error' => $e->getMessage()
    //     //         ], 401);
    //     //     }

    //     //     if($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException){
    //     //         return response([
    //     //             'status' => 'errors',
    //     //             'error' => 'Resource Not Fount'
    //     //         ], 404);
    //     //     }

            

    //     // }

    //     parent::render( $request, $e);
    // }
}
