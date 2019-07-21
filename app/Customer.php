<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    Protected $table = "customer";
    public function bill()
    {
        return $this->hasMany('App\Bills', 'id_customer', 'id');
    }
}
