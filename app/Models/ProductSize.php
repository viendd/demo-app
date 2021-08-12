<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $table = 'product_size';
    protected $fillable = ['size', 'price_marketing', 'price_sell', 'product_id', 'sold'];
}
