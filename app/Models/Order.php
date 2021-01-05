<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'oder_date',
        'oder_status',
        'total_product',
        'vat',
        'total',
        'pay',
        'due',

    ];
}
