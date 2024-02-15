<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'requisition_id',
        'product_id',
        'price',
        'purchase_price',
        'sale_price',
        'batch_no',
        'request_qty',
        'dispatch_qty',
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

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
