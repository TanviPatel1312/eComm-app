<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImages;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'product_name',
        'description',
        'slug',
        'cover'

    ];
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','category_by_products')->withTimestamps();
    }
    public function images(){
        return $this->hasMany(ProductImages::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
