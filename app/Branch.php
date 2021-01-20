<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['en_branch_location','ar_branch_location','en_branch_city','ar_branch_city', 'en_branch_address','ar_branch_address', 'branch_phone_1', 'branch_phone_2', 'branch_phone_3', 'image'];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
