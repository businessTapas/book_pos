<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStockInventery extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'store_id',
        'storage_site_id',
        'storage_location_id',
        'transfer_from_id',
        'rack_id',
        'qty',
        'purchase_price',
        'sale_price',
        'supplier_price',
        'discount_amount',
        'batch_no',
        'description',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function transfer_site()
    {
        return $this->belongsTo(MasterStockInventery::class,'transfer_from_id');
    }
    public function storage_site()
    {
        return $this->belongsTo(StorageSite::class);
    }
    public function storage_location()
    {
        return $this->belongsTo(StorageLocation::class);
    }
    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }
    public function adjust_master_stock(){
        return $this->hasMany(AdjustMasterStock::class, 'master_stock_inventeries_id');
    }
}
