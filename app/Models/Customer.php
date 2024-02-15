<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'company_name',
        'email',
        'phone',
        'alternative_phone',
        'gender',
        'dob',
        'status',
        'gst_no',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
        'store_id'
    ];

    public function address()
    {
        return $this->hasMany(Address::class,'customer_id','id');

    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
