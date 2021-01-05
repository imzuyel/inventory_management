<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;
    protected $fillable = [
        'details',
        'cost_total_price',
        'created_at',
        'created_time',
    ];
}
