<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

Trait ExceptionTrait
{

public function apiException($request, $e){



            if($this->isModel($e)){

              return  $this->ModelResponse($e);
           }

           if($this->isHttp($e)){
               
            return $this->HttpResponse($e);
           }

}


public function isModel($e){

    return $e instanceof ModelNotFoundException;
}

protected function ModelResponse($e){

    return response()->json([
        'errors'=>'Product Model not found'
    ],Response::HTTP_NOT_FOUND);
}

public function isHttp($e){

    return $e instanceof NotFoundHttpException;
}
protected function HttpResponse(){

    return response()->json([
        'errors'=>'Incorect route'
    ],Response::HTTP_NOT_FOUND);

}



}
