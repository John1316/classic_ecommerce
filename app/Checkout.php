<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = ['order_id', 'address_id'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function address() {
        return $this->belongsTo(Address::class);
    }
}
