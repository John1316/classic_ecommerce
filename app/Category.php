<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['en_name', 'ar_name', 'en_text', 'ar_text', 'en_slug','image' , 'ar_slug', 'brand_id', 'banner_image'];

    public function getRouteKeyName() {
        if(app()->getLocale() == 'en') {
            return 'en_slug';
        } else {
            return 'ar_slug';
        }
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function products() {
        return $this->hasMany(Product::class)->where('status', 1);
    }
}
