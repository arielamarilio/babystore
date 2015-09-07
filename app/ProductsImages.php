<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsImages extends Model
{
    protected $fillable = ['id', 'products_id', 'image', 'description', 'state'];

    public function product()
	{
		return $this->belongsTo('App\Products');
	}

}
