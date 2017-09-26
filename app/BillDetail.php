<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table="bill_detail";
    //1 sp thuộc 1 cthd
    public function product(){
    	return $this->belongsTo('App\Product','id_product','id');
    }
    //1 bill_detail thuoc về 1 bill nao đó  
    public function bill(){
    	return $this->belongsTo('App\Bill','id_bill','id');
    }
}
