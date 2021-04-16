<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
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
    
    public function render($request , Throwable $exception){

        if($request->expectsJson()){

            if($exception instanceof ModelNotFoundException){

                return response()->json([
                    'errors'=>'Product Model not found'
                ],Response::HTTP_NOT_FOUND);
           }

           if($exception instanceof NotFoundHttpException){
               return response()->json([
                   'errors'=>'Incorect route'
               ],Response::HTTP_NOT_FOUND);
           }
        }

        //dd($exception);
        return parent::render($request, $exception);

       
    }

    

}
