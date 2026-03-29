<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
   
    public function index()
    {
        $orders=Order::with('user')->latest()->get();
        return view('admin.orders.index',compact('orders'));
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        
    }


    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
       
    }

 
    public function destroy(string $id)
    {
    
    }

public function updateOrderStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,paid,completed,cancelled'
    ]);

    $order = Order::findOrFail($id);
    $order->update(['status' => $request->status]);

    return response()->json([
        'success' => true,
        'message' => 'Order status updated successfully!',
        'new_status' => $order->status
    ]);
}


    
    }
