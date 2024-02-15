<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GstSlab extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'tax', 'description', 'status', 'created_by', 'updated_by', 'deleted_by'];
}
