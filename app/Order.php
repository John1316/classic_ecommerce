<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_price', 'confirmed_by_user', 'status', 'promo_code_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function promo() {
        return $this->belongsTo(PromoCode::class, 'promo_code_id', 'id');
    }

    public function order_details() {
        return $this->hasMany(OrderDetail::class);
    }

    public function checkout() {
        return $this->hasOne(Checkout::class);
    }
}
