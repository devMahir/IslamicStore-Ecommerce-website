<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function order(){
        $orders = Order::where('user_id',Auth::id())->latest()->get();
        return view('pages.profile.order',compact('orders'));
    }

    // order view
    public function orderView($order_id){
        $order = Order::findOrFail($order_id);
        $orderitems = OrderItem::with('product')->where('order_id',$order_id)->get();
        $shipping = Shipping::where('order_id',$order_id)->first();
        return view('pages.profile.order-view',compact('order','orderitems','shipping'));
    }
}
