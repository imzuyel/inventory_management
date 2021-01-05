<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_slug',
        'category_id',
        'brand_id',
        'supplier_id',
        'product_code',
        'product_place',
        'product_route',
        'photo',
        'buy_date',
        'expire_date',
        'buying_price',
        'selling_price',
        'status',
    ];
}
