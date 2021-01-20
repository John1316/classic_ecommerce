<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['en_name', 'ar_name', 'en_text', 'ar_text', 'en_slug', 'ar_slug', 'banner_image'];

    public function getRouteKeyName() {
        if(app()->getLocale() == 'en') {
            return 'en_slug';
        } else {
            return 'ar_slug';
        }
    }
    
    public function categories() {
        return $this->hasMany(Category::class);
    }
}
