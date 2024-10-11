<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'model',
        'description',
        'price',
        'image',
        'long_description',
        'material',
        'dimensions',
        'weight',
        'warranty_period'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
