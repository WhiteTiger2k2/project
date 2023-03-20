<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        // foreach($old_cartItems as $item) 
        // {
        //     if(!Product::where('id', $item->product_id))
        // }
        
        return Redirect::route('add-cart');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();
        $orders = DB::table('orders')->select('users.name as user_name', 'users.phone as user_phone', 'users.email as user_email', 'users.address as user_address', 'orders.*')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->get();
        $categories = DB::table('categories')->get();
        return view('pages.cart', [
            'categories' => $categories,
            'products' => $products,
            'carts' => Session::get('carts'),
            'orders' => $orders,
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return  Redirect::route('add-cart');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return Redirect::route('add-cart');
    }

    // public function addCart(Request $request)
    // {
    //     $this->cartService->addCart($request);
        
    //     return redirect()->back();
    // }

    public function addProduct(Request $request)
    {
        $product_id = (int)$request->input('product_id');
        $quantity = (int)$request->input('quantity');
        
        if(Auth::check())
        {
            $product_check = Product::where('id', $product_id)->first();

            if($product_check)
            {
                if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return Redirect::route('home.cart');
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->quantity = $quantity;
                    $cartItem->save();
                    return Redirect::route('home.cart');
                }
                
            }
        }
        else
        {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function viewCart()
    {
        $categories = DB::table('categories')->get();
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('pages.cart', [
            'categories' => $categories,
            'cartItems' => $cartItems,
        ]);
    }

    public function deleteProduct($product_id)
    {
        if(Auth::check())
        {
            // $product_id = $request->input('product_id');
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return redirect()->back();
            }
        }
        else
        {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function updateCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $qty = $request->input('quantity');
        if(Auth::check())
        {
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cart->quantity = $qty;
                $cart->update();
                return response()->json(['status' => "Cập nhật thành công!"]);
            }
        }
    }

    public function addCart(Request $request)
    {  
        $cartItems = Cart::where('user_id', Auth::id())->get();
            // if (is_null($cartItems))
            //     return false;

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'status' => $request->status ?? 0,
                'message' => $request->message,
            ]);
            foreach ($cartItems as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price' => $item->products->price
                ]);
                
            }
        
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->back();
    }
}
