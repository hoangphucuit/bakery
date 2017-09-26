<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //ProductType 1:n Product
    protected $table="type_products";
    // tao quan he 1 nhieu (1 loai sp co nhieu sp)
    public function product(){
    	return $this->hasMany('App\Product','id_type','id');//duong dan,khoa ngoai, khoa chinh
    }
}
