<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size_id',
        'thickness_id',
        'dimension_in_inches',
        'dimension_in_feet',
        'dimension_in_cm',
        'product_variant_code',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function thickness()
    {
        return $this->belongsTo(Thickness::class);
    }
}
