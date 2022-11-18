<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        "product_name",
        "description",
        "price_tag"
    ];
}
