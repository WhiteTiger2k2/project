<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HistoryController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
    public function index()
    {
        $categories = DB::table('categories')->get();
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $orders = DB::table('orders')->select('users.name as name', 'users.phone as phone', 'users.email as email', 'users.address as address', 'orders.*')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->get();
        $orderItems = Order::where('user_id', Auth::id())->get();
        return view('pages.View', [
            
            'orderItems' => $orderItems,
            'cartItems' => $cartItems,
            'categories' => $categories,
        ]);
    }

    public function show(Order $order)
    {
        $categories = DB::table('categories')->get();
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $carts = $this->cart->getProductForCart($order);
        $orders = Order::where('user_id', Auth::id())->get();

        return view('pages.historyDetail', [
            'cartItems' => $cartItems,
            'categories' => $categories,
            'title' => 'Chi Tiết Đơn Hàng: ' . $order->id,
            'order' => $order,
            'carts' => $carts,
            'orders' => $orders,
        ]);
    }

    public function update(Request $request, Order $order)
    {
        if($order->status == 1)
        {
            return Redirect::route('home.history');
        }
        else 
        {
            $order->status = $request->status;
            $order->edit();
        }
        return Redirect::route('home.history');
    }
}
