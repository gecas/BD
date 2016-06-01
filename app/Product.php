<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = 
    ['title', 'category_id', 'brand_id', 'slug', 'description', 'stock', 'price'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }

    public function images()
    {
    	return $this->hasMany('App\ProductImage');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function order_products()
    {
        return $this->hasMany('App\OrderProduct');
    }
}
