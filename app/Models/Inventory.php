<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_vendor',
        'product_model',
        'product_type',
        'product_number',
        'product_location',
        'product_floor',
        'product_office',
        'product_purchase_date',
        'ip_address',
    ];


}
