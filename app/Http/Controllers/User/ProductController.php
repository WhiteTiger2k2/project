<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function show($id){
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->select( 'categories.name as category', 'discounts.name as discount', 'discounts.discount_percent as discount_percent', 'product_details.color as color', 'product_details.size as size', 'products.*')
        ->where('products.id', $id)
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->join('product_details', 'product_details.product_id', '=', 'products.id')
        ->get();
        $otherproducts = DB::table('products')->select( 'products.*')
        ->orderByDesc('id')->limit(10)
        ->get();
        return view('pages.product', [
            'categories' => $categories,
            'products' => $products,
            'otherproducts' => $otherproducts,
            'cartItems' => $cartItems,
        ]);
    }
    
}
