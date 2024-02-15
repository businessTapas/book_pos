<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Discount extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $fillable = [
        'id',
        'name',
        'discount',
        'description',
        'coupon_code',
        'min',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
