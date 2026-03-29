<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Book;
use App\Models\Comment; 

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers=User::count();//عدد اليوزر

        $totalOrders=Order::count();//عدد الطلبات

        $totalBooks=Book::count();//عدد الكتب

   $totalComments=Comment::count();//عدد التعليقات


    return view('admin.dashboard', compact(
            'totalUsers',      
            'totalOrders',    
            'totalBooks',
            'totalComments',  
      
        ));

    }
}
