<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * @property  description
 */
class Products extends Model
{
    use SoftDeletes;

    public function cartItems(){
        return $this->hasMany('App\CartItem','product_id','id');
    }
}
