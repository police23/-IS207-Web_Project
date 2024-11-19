<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'product_id';


    protected $fillable = [
       'phone_code',
        'phone_name',
        'brand_name',
        'color',
        'camera',
        'quantity',
        'price',
        'storage',
        'stock_quantity',
        'status',
        'image',
        'description',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}
