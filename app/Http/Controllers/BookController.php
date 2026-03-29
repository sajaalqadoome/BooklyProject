<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
   
    public function index()
    {
        $books=Book::all();
        return view('admin.books.show',compact('books'));

    }

    
    public function create()
    {
        $categories=Category::all();
        return view('admin.books.create',   compact('categories'));
    }
public function getSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }
  
public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif,webp|max:2048',
        'pdf_file'=>'nullable|mimes:pdf|max:10240',
            ]);

        $data = [
            'title'  => $request->title,
            'author' => $request->author,
            'price'  => $request->price,
            'stock'  => $request->stock,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/books'), $imageName);
            $data['image'] = $imageName;
        }
     if ($request->hasFile('pdf_file') && $request->file('pdf_file')->isValid()) {
            $pdfName = time() . '_' . $request->file('pdf_file')->getClientOriginalName();
            $request->file('pdf_file')->move(public_path('pdfs/books'), $pdfName);
            $data['pdf_file'] = $pdfName;
        }

        Book::create($data);

        return redirect()->route('admin.books.index')->with('success', 'Book Added Successfully!');
    } catch (\Exception $e) {
        //dd($e->getMessage()); 
    }
}
    public function show(string $id)
    {
        $book=Book::findOrFail($id);
        return view('Admin.books.show',compact('book'));
    }

   
    public function edit(string $id)
    {
        $book=Book::findOrFail($id);
        return view('admin.books.edit',compact('book'));
    }

    public function update(Request $request,Book $book )
    {
$validated=$request->validate([
    'title'=>'required|string|max:255',
    'author'=>'required|string|max:255',
    'price'=>'required|numeric|min:0',
    'stock'=>'required|integer|min:0',
    'category_id' => 'required|integer|between:1,8',
    'description'=>'nullable|string',

]);


    
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        if ($book->image && file_exists(public_path('images/books/' . $book->image))) {
            unlink(public_path('images/books/' . $book->image));
        }

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/books'), $imageName);
        $validated['image'] = $imageName;
    }
    else
    {
$validated['image']=$book->image;
    }
$book->update($validated);
return redirect()->route('admin.books.index')->with('success','The book has been updated successfully');
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success','The delete succsssfuly');

        
    }

public function shop(Request $request) 
    {
        $categories = Category::all();
        
        $query = Book::query();
        
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('name', $request->category);
            });
        }
      
        $books = $query->simplePaginate(4);
        
        return view('user.pages.shop', compact('books', 'categories'));
    }



public function showProduct($id)
{
    $book = Book::findOrFail($id);
    

    return view('User.pages.single-product', compact('book'));
}

public function readBook($id)
{
    $book = Book::findOrFail($id);
    
    if (!$book->pdf_file) {
        return redirect()->back()->with('error', 'PDF not available for this book.');
    }
    
    return view('User.pages.read-book', compact('book'));
}

public function search(Request $request)
{
    $query=$request->input('s');
    $books=Book::where('title','LIKE',"%{$query}%")
->orWhere('author','LIKE',"{$query}")->orWhere('description','LIKE',"%{$query}%")
->paginate(12);
 return view('books.search', compact('books', 'query'));


    }
}


