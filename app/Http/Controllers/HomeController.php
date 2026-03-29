<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 public function index(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            $books = Book::where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('author', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
                
                if (is_numeric($query)) {
                    $price = floatval($query);
                    $q->orWhereBetween('price', [$price - 1, $price + 1]);
                }
            })
            ->with(['category', 'subcategory'])
            ->latest()
            ->get();
        } else {
            $books = Book::with(['category', 'subcategory'])->latest()->get();
        }

        return view('user.pages.home', compact('books'));
    }

}