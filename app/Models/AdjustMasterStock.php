<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdjustMasterStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'master_stock_inventeries_id',
        'prev_qty',
        'adjust_qty',
        'adjust_amount',
        'prev_sale_price',
        'adjust_sale_price',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by'
    ]; 

    public function master_stock()
    {
        return $this->belongsTo(MasterStockInventery::class, 'master_stock_inventeries_id');
    }
}
