<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    public function product()
    {
        return $this->belongsTo('App\Product', 'id_product', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
