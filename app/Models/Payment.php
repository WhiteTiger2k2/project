<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'payment_id',
        'message'
    ];
}
