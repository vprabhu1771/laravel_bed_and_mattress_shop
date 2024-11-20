<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    /**
    * Relationship to the ProductSize model.
    */
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }

    /**
    * Relationship to the Size model (through ProductSize).
    */
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size')
                    ->withPivot('price')
                    ->withTimestamps();
        // return $this->belongsToMany(Size::class, 'product_size');
    }
}
