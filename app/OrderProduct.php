<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
	//protected $table = 'order_products';

	protected $fillable = ['order_id', 'product_id', 'quantity'];

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

    public function products()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }
}
