<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\JsonResource;

class productCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=> $this->name,
            'discount'=> $this->discount,
            'rating'=>$this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No Rating Yet',
            'totalPrice'=> round((1-($this->discount/100))* $this->price,2), 
            'href' => [
                'products'=>route('products.show', $this->id ) 
            ]
        ];
    }
}
