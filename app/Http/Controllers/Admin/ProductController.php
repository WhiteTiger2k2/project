<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use \App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = new Product();
        // $product = $products->index();
        $products = DB::table('products')->select( 'categories.id as category_id', 'discounts.id as discount_id', 'categories.name as category', 'discounts.name as discount', 'discounts.discount_percent as discount_percent', 'products.*')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->get();
        return view('admin.product.product', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        $discounts = DB::table('discounts')->get();
        return view('admin.product.product_create', [
            'categories' => $categories,
            'discounts' => $discounts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image' => $file_name]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->category_id = $request->category_id;
        $product->discount_id = $request->discount_id;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->featured = $request->featured;
        $product->address = $request->address;
        $product->description =  $request->description;
        $product->active = $request->active;
        $product->store();

        return Redirect::route('product')->with('mess', 'Thêm sản phẩm mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = DB::table('categories')->get();
        $discounts = DB::table('discounts')->get();
        return view('admin.product.product_edit', [
            'product' => $product,
            'categories' => $categories,
            'discounts' => $discounts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest;
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image' => $file_name]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->category_id = $request->category_id;
        $product->discount_id = $request->discount_id;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->featured = $request->featured;
        $product->address = $request->address;
        $product->description =  $request->description;
        $product->active = $request->active;
        $product->edit();
        return Redirect::route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect::route('product')->with('sucess', 'Xóa sản phẩm thành công!');
    }
}
