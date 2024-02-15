<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_id',
        'publisher_id',
        'status',
        'sale_mode',
        'storage_site_id',
        'store_id',
        'sale_by',
        'invoice_no',
        'description',
        'sale_date',
        'sale_price',
        'total_tax',
        'shipping_charges',
        'discount_type',
        'discount',
        'sub_total',
        'total',
        'created_at',
        'updated_at'
    ];

    public function details()
    {
        return $this->hasMany(RequisitionDetails::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function to_store()
    {
        return $this->belongsTo(Store::class,'to_store');
    }
    public function store2()
    {
        return $this->belongsTo(Store::class,'to_store');
    }

    /* public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    } */
/* ================ By TApas ==========================*/
    public function customer(){
        return $this->belongsTo(Customer::class);
    }



    public function user() {
        return $this->belongsTo(User::class, 'sale_by');
    }
    public function supplier()
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }

    public function saledetails(){
        return $this->hasMany(SaleDetails::class);
    }
    public function salepayament(){
        return $this->hasOne(SalePayament::class);
    }
}
