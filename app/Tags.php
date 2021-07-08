<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function products()
    {
    	return $this->belongsToMany('App\Product', 'products_tags', 'tags_id', 'product_id');
    }
}
