<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $fillable = ['code', 'percentage', 'status'];

    public function orders() {
        return $this->hasMany(Order::class, 'promo_code_id', 'id');
    }
}
