<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name_product', 'category_id', 'price','image', 'discount', 'description'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
