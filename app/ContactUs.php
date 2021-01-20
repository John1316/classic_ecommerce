<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = ['sales_email_1', 'sales_email_2', 'sales_email_3', 'phone', 'fax', 'en_location', 'ar_location', 'en_address', 'ar_address', 'en_work_days', 'ar_work_days', 'en_work_hours', 'ar_work_hours', 'facebook', 'instagram', 'twitter', 'banner_image'];

}
