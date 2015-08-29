<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['id', 'categorie_id', 'brand_id', 'title', 'description', 'gender', 'state', 'price', 'monetary_discount', 'percentage_discount', 'rating_up', 'rating_down', 'situation', 'created_at', 'updated_at', 'user_id'];
}