<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongToUser extends Exception
{
    //
    public function render(){

        return ['errors'=>'product dont belong to user'];
    }
}
