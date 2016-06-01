<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	protected $fillable =
	 ['image_path', 'image_name', 'image_thumbnail_path', 'image_thumbnail_name', 'product_id'];

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }
}
