<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Protected $table = "products";

    public function product_type()
    {
        return $this->belongsTo('App\ProductType', 'id_type', 'id');
    }
    public function bill_detail()
    {
        return $this->hasMany('App\BillDetail', 'id_product', 'id');
    }
    public function wishlist()
    {
        return $this->hasMany('App\Wishlist', 'id_product', 'id');
    }
}
