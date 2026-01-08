<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'email',
        'address',
        'phone',
        'location',
        'logo',
        'mobile_logo',
        'favicon',
        'terms_and_conditions',
        'privacy_policy',
        'legal_notices',
        'about_us',
        'facebook',
        'instagram',
        'linkedin',
        'whatsapp',
    ];
}
