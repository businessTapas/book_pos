<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageLocation extends Model
{
    use HasFactory; // storrage or storage??
    protected $fillable = ['name', 'sub_location_name', 'storage_site_id', 'description', 'status', 'created_by', 'updated_by', 'deleted_by'];

    public function storage_site()
    {
        return $this->belongsTo(StorageSite::class,'storage_site_id','id');
    }
}
