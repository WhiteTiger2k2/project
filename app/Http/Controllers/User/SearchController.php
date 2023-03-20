<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $categories = DB::table('categories')->get();
        $search = $request->search ?? '';

        $products = DB::table('products')->select('product_images.path as image', 'discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('product_images', 'product_images.product_id', '=', 'products.id')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->where('products.name', 'like', '%' . $search . '%')
        ->get();
        return view('pages.search', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function getProductOnIndex(Request $request){
        $categories = DB::table('categories')->get();
        $search = $request->search ?? '';

        $products = DB::table('products')->where('name', 'like', '%' . $search . '%')
        ->get();
        return view('pages.search', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
