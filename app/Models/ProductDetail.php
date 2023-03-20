<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'product_details';

    public $timestamps = true;

    protected $fillable = [
        'product_id',
        'color',
        'size'
    ];
}
