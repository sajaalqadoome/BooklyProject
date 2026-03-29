<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function add($bookId)
    {
        $user = Auth::user();
        
        $book = Book::findOrFail($bookId);

        $exists = $user->wishlist()->where('book_id', $bookId)->exists();

        if ($exists) {
            return back()->with('info', __('هذا الكتاب موجود في المفضلة مسبقاً'));
        }

        $user->wishlist()->attach($bookId);

        return back()->with('success', __('✓ تمت الإضافة إلى المفضلة'));
    }

  
    public function remove($bookId)
    {
        Auth::user()->wishlist()->detach($bookId);
        return back()->with('success', __('تمت الإزالة من المفضلة'));
    }

 
    public function index()
    {
        $wishlist = Auth::user()->wishlist()->with('category')->get();
        return view('user.pages.Fav', compact('wishlist'));
    }
}