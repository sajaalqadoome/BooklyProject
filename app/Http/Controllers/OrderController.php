<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::where('user_id',auth()->id())
        ->with('payment')->orderBy('created_at','desc')->get();

        return view('User.Orders.index',compact('orders'));
    }
public function show($id)
{
    $order=Order::where('user_id',auth()->id())
    ->where('id',$id)->with(['items.book','payment'])->firstOrFail();
    return view('User.Orders.show',compact('order'));
}

}
