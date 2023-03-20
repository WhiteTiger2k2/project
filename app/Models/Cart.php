<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
    ];


    public function Products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function edit(){
        DB::table('carts')
        ->where('id', $this->id)->where('user_id', Auth::id())
        ->update([
            'quantity' => $this->quantity,
        ]);
    }

    public function delete(){
        DB::table('carts')
        ->where('id', $this->id)
        ->delete();
    }
}
