<?php

namespace App\Models;

use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'address',
        'description',
        'deleted_at',
        'created_at',
        'updated_at',
        'product_id',
        'publisher_id',
        'district_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    public function district()
    {
        return $this->belongsTo(District::class,'district_id','id');
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'publisher_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
