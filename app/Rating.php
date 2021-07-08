<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';

    public function products(){
    	return $this->belongsTo('App\Product', 'product_id');
    }
}
