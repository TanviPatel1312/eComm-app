<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class ProductDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'subcategory_id',
        'size_id',
        'color_id',
        'price',
        'stock'
    ];
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class,'size_id','id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class,'color_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
