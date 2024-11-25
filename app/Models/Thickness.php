<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thickness extends Model
{
    use HasFactory;

    protected $fillable = [
        'value_in_inches',
        'value_in_feet',
        'value_in_cm'
    ];
}
