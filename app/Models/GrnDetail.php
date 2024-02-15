<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrnDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'grn_id',
        'product_id',
        'storage_site_id',
        'storage_location_id',
        'rack_id',
        'price',
        'purchase_price',
        'sale_price',
        'batch_no',
        'request_qty',
        'dispatch_qty',
        'received_qty',
        'cgst',
        'sgst',
        'igst',
        'tax_amount',
        'taxeble_amount',
        'total_amount',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
