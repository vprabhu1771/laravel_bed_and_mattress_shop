<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dimensions'
    ];

    /**
     * Relationship to the Product model (through ProductSize).
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_size')
                    ->withPivot('price')
                    ->withTimestamps();
        // return $this->belongsToMany(Product::class, 'product_size');
    }

    /**
     * Relationship to the ProductSize model.
     */
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class, 'size_id');
    }    
}
