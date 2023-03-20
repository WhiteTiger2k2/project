<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->orderByDesc('products.id')
        ->get();
        $hotproducts = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->where('featured', '=', 1)->orderBy('id', 'desc')->limit(3)
        ->get();
        return view('pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'hotproducts' => $hotproducts,
            'cartItems' => $cartItems,
        ]);
    }

    public function sortPopularity()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->where('products.featured', '=', 1)
        ->orderByDesc('products.id')
        ->get();
        return view('pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    public function sortByPriceLowToHigh(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();

        $products = DB::table('products')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->select([
            'discounts.name as discount', 
            'discounts.discount_percent as discount_percent', 
            'products.*',
            DB::raw('(products.price - (products.price * discounts.discount_percent)/100) as price_sale')
        ])
        ->orderBy('price_sale', 'asc')
        ->get();

        

        return view('pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    public function sortByPriceHightToLow()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();

        $products = DB::table('products')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->select([
            'discounts.name as discount', 
            'discounts.discount_percent as discount_percent', 
            'products.*',
            DB::raw('(products.price - (products.price * discounts.discount_percent)/100) as price_sale')
        ])
        ->orderBy('price_sale', 'desc')
        ->get();

        return view('pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    public function sortByPriceFirst()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();

        $products = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->whereBetween('products.price', [0, 500])
        ->orderByDesc('products.id')
        ->get();

        return view('pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    public function sortByPriceSecond()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();

        $products = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->whereBetween('products.price', [500000, 1000000])
        ->orderByDesc('products.id')
        ->get();

        return view('pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    public function sortByPriceThird()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();

        $products = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->where('products.price', '>', 1000000)
        ->orderByDesc('products.id')
        ->get();

        return view('pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    public function sortByBlack()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();

        $products = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->join('product_details', 'products.id', '=', 'product_details.product_id' )
        ->where('product_details.color', '=', 'Đen')
        ->orderByDesc('products.id')
        ->get();

        return view('pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    public function sortByWhite()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();

        $products = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->join('product_details', 'products.id', '=', 'product_details.product_id' )
        ->where('product_details.color', '=', 'Trắng')
        ->orderByDesc('products.id')
        ->get();

        return view('pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    public function sortByBlue()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();

        $products = DB::table('products')->select('discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->join('product_details', 'products.id', '=', 'product_details.product_id' )
        ->where('product_details.color', '=', 'Xanh')
        ->orderByDesc('products.id')
        ->get();

        return view('pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }
}
