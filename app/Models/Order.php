<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model

{
    use HasFactory;

    protected $fillable = [
        'address',
        'total',
        // Add other fields here
    ];

    // Define relationships, if needed (e.g., with User or Product models)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
