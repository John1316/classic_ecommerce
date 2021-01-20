<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerImage extends Model
{
    protected $fillable = ['cart_banner_image', 'checkout_banner_image', 'profile_banner_image', 'shop_banner_image', 'branches_banner_image', 'shipping_banner_image'];
}
