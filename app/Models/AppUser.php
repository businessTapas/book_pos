<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AppUser extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    protected  $fillable = [
        'name',
        'gender',
        'mobile',
        'password',
        'email',
        'dob',
        'blood_group',
        'profile_pic',
        'address',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
