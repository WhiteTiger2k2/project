<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Http\Services\CategoryService;
use App\Http\Services\Menu\CategoryService as MenuCategoryService;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function show($id)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')
        ->get();
        $products = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->where('products.category_id', $id)
        ->get();
        $hotproducts = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->where('featured', '=', 1)->orderBy('id', 'desc')->limit(3)
        ->get();
        return view('pages.category', [
            'categories' => $categories,
            'products' => $products,
            'hotproducts' => $hotproducts,
            'cartItems' => $cartItems,
        ]);
    }

}
