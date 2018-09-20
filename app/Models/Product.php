<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $guarded=[];
    public function category(){
    	 return $this->belongsTo('App\Models\Category','cate_id');
    }
}
