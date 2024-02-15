<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_id',
        'product_id',
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
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
