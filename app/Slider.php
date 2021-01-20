<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['en_title', 'ar_title', 'en_text', 'ar_text', 'image'];
}
