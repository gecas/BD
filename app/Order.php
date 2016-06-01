<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order_products()
    {
    	return $this->hasMany('App\OrderProduct');
    }

    public function products()
    {
    	return $this->belongsTo('App\Product');
    }
}
