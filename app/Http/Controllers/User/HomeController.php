<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();
        $newProducts = DB::table('Products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->orderBy('id', 'desc')->limit(8)
        ->get();
        $saleProducts = DB::table('Products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->where('discounts.discount_percent', '>', 0)
        ->orderBy('id', 'asc')
        ->limit(8)
        ->get();
        $featureProducts = DB::table('Products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->where('featured', '=', '1')->orderBy('id', 'asc')
        ->limit(8)->get();
        return view('index', [
            'categories' => $categories,
            'newProducts' => $newProducts,
            'saleProducts' => $saleProducts,
            'featureProducts' => $featureProducts,
            'cartItems' => $cartItems,
        ]);
    }
    
}
