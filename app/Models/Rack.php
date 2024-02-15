<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'position', 'storage_site_id', 'storage_location_id', 'description', 'status', 'created_by', 'updated_by', 'deleted_by'];
}
