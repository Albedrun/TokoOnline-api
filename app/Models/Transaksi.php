<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaction_id';
    protected $fillable = [
        "product_name",
        "payment_price",
        "payment_result"
    ];
}
