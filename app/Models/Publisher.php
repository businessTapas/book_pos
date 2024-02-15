<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'state_id',
        'district_id',
        'store_name',
        'type',
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
        return $this->belongsTo(District::class);
    }
    function user() {
        return $this->hasOne(User::class,'publisher_id','id');
    }
}
