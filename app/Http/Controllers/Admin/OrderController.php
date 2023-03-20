<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Order;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $orders = DB::table('orders')->select('users.name as name', 'users.phone as phone', 'users.email as email', 'users.address as address', 'orders.*')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->get();
        return view('admin.order.order-list', [
            'orders' => $this->cart->getCustomer()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $carts = $this->cart->getProductForCart($order);
        $orders = DB::table('orders')->select('users.name as name', 'users.phone as phone', 'users.email as email', 'users.address as address', 'orders.*')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->where('orders.id', $order->id)
        ->get();

        return view('admin.order.order-detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $order->id,
            'order' => $order,
            'carts' => $carts,
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if($order->status == 3)
        {
            return Redirect::route('order');
        }
        else 
        {
            $order->status = $request->status;
            $order->edit();
        }
        return Redirect::route('order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dayRevenue()
    {
        $revenues = new Order();
        $revenue = $revenues->dayRevenue();
        return view('admin.revenue.day', [
            'revenues' => $revenue
        ]);
    }

    public function monthRevenue()
    {
        $revenues = new Order();
        $revenue = $revenues->monthRevenue();
        return view('admin.revenue.month', [
            'revenues' => $revenue
        ]);
    }

    public function dayOrderDetail($date)
    {
        $orders = new Order();
        $order = $orders->dayOrderDetail($date);

        return view('admin.revenue.revenue_details', [
            'orders' => $order
        ]);
    }

    public function monthOrderDetail($date)
    {
        $orders = new Order();
        $order = $orders->monthOrderDetail($date);

        return view('admin.revenue.revenue_details', [
            'orders' => $order
        ]);
    }
}
