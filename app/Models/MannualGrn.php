<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MannualGrn extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'supplier_id',
        'grn_no',
        'grn_date',
        'round_off_amount',
        'total_amount',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'dispatch_by',
        'received_by',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }
}
