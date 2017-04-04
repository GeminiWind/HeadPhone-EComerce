<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    public function category()
    {
        # code...
        return $this->belongsTo('App\Models\Category');

    }

    public function orderProduct()
    {
    	# code...
    	return $this->belongsToMany('App\Models\OrderProduct','product_id');
    }

    public function stoke()
    {
        # code...
        return $this->belongsTo('App\Models\Stoke','stoke_id');

    }

}
