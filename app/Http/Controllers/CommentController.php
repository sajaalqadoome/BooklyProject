<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ], [
            'content.required' => 'Comment field required',
            'content.max' => 'Comments must not exceed 1000 characters',
        ]);

        Comment::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'تم إضافة تعليقك بنجاح!');
    }
}