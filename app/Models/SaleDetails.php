<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    use HasFactory;

    protected $fillable=[
        'sale_id',
        'product_id',
        'price',
        'purchase_price',
        'sale_price',
        'batch_no',
        'qty',
        'tax_percentage',
        'tax_amount',
        'taxeble_amount',
        'total_amount',
        'created_at',
        'updated_at'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
