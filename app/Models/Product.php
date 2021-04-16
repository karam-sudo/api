<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','detail','stock','price','user_id','discount'
    ];


    public function reviews(){

        return $this->hasMany(Review::class);

    }
}
