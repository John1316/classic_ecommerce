<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['en_name', 'ar_name','en_text', 'ar_text', 'en_slug', 'ar_slug', 'category_id', 'image', 'price_before_discount', 'price_after_discount', 'featured', 'hot_deal', 'status', 'banner_image'];

    public function getRouteKeyName() {
        if(app()->getLocale() == 'en') {
            return 'en_slug';
        } else {
            return 'ar_slug';
        }
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function productImages() {
        return $this->hasMany(ProductImage::class);
    }

    public function firstProductImage() {
        return $this->productImages()->first();
    }
}
