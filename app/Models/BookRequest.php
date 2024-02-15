<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'supplier_id',
        'gst_slab_id',
        'title',
        'author',
        'isbn',
        'price',
        'publication_date',
        'language',
        'weight',
        'dimensions',
        'image',
        'pages',
        'description',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
