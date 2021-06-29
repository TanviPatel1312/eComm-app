<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_img',
    ];
    public function product()
    {
        return $this->belongsToMany('App\Models\Product','product_images')->withTimestamps();
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
