<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    protected $table='categories';
    protected $primaryKey='id';
    protected $guarded=[];
    public function product(){
    	return $this->hasMany('App\Models\Product','cate_id');
    }
}
