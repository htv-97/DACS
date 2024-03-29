<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    Protected $table = "bills";
    public function bill_detail()
    {
        return $this->hasMany('App\BillDetail', 'id_bill', 'id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'id_customer', 'id');
    }
}
