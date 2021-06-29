<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable  = [
        'category_id',
        'subcategory_name'
    ];
//    public function categories()
//    {
//        return $this->belongsToMany('App\Models\Category','sub_categories')->withTimestamps();
//    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
