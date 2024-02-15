<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable=[
        'state_id',
        'district_id',
        'store_name',
        'type',
        'publisher_id',
        'address',
        'pin_code',
        'status',
        'bank_name',
        'acc_holder_name',
        'acc_no',
        'ifsc_code',
        'gst_no',
        'logo_image',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    function district(){
        return $this->belongsTo(District::class,'district_id','id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'store_id','id');

    }
    

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
