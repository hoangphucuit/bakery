<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //khai bao bang
    protected $table="products";
    //1 sp thuoc ve 1 loai sp
    public function product_type(){
    	return $this->belongsTo('App\ProductType','id_type','id');
    }
    //1 sp co nhieu trong 1 cthd
    public function bill_detail()
    {
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
}
