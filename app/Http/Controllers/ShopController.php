<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            $books = Book::where('title', 'like', "%{$query}%")
                        ->orWhere('author', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%")
                        ->paginate(12);
        } else {
            $books = Book::with('category')->paginate(12);
        }

        $categories = Category::all();

        return view('user.pages.category-books', compact('books', 'categories', 'query'));
    }

    public function byCategory($id)
    {
        $category = Category::findOrFail($id);
        $books = Book::where('category_id', $id)->paginate(12);
        $allCategories = Category::all();

        return view('user.pages.category-books', compact('books', 'allCategories', 'category'));
    }
}