<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['en_location', 'ar_location', 'price'];   

    public function addresses() {
        return $this->hasMany(Address::class);
    }
}
