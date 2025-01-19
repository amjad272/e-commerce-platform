<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'sku',
        'category_id',
        'subcategory_id',
        'store_id',
        'seller_id',
        'regular_price',
        'discounted_price',
        'tax_rate',
        'stock_quantity',
        'slug',
        'meta_title',
        'meta_description',
        'status'
    ];

    public function seller()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function image()
    {
        return $this->hasMany(ProductImage::class);
    }
}
