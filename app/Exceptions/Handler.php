<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//use Exception;

use Throwable;

class Handler extends ExceptionHandler
{

    use ExceptionTrait;
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
           return $this->apiException($request , $exception);
        }

        //dd($exception);
        return parent::render($request, $exception);

       
    }

    

}
