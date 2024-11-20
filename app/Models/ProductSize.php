<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $table = 'product_size'; // Specify the table name

    protected $fillable = [
        'product_id',
        'size_id',
        'price'
    ];

    /**
     * Relationship to the Product model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Relationship to the Size model.
     */
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
