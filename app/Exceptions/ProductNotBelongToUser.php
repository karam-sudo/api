<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongToUser extends Exception
{
    //
    public function render(){

        return ['errors'=>'product not belongs to user'];
    }
}
