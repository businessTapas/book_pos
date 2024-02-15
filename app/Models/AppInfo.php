<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppInfo extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'version',
        'beta_url',
        'playstore_url',
        'appstore_url',
        'logo',
        'dark_logo',
        'fav_icon'
    ];
}
