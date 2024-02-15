<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MannualGrnDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'mannual_grn_id',
        'product_id',
        'storage_site_id',
        'storage_location_id',
        'rack_id',
        'price',
        'batch_no',
        'request_qty',
        'total_amount',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
