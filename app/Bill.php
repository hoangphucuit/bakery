<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table="bills";
    //1 bill co nhiều bill_detail
    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_bill','id');
    }
    //1 bill thuoc về 1 customer
    public function customer(){
    	return $this->belongsTo('App\Customer','id_customer','id');
    }
}
