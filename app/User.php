<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function unConfirmedOrder() {
        return $this->orders()->where('confirmed_by_user', 0)->orderBy('created_at', 'desc')->first();
    }

    public function confirmedOrders() {
        return $this->orders()->where('confirmed_by_user', 1)->orderBy('created_at', 'desc');
    }

    public function addresses() {
        return $this->hasMany(Address::class);
    }
}
