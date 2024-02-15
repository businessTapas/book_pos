<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageSite extends Model
{
    use HasFactory;
    protected $fillable = ['store_id', 'name', 'address', 'pincode', 'description', 'status', 'created_by', 'updated_by', 'deleted_by'];
    
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function Store_location()
    {
        return $this->hasMany(StorageLocation::class,'storage_site_id','id');
    }
}
