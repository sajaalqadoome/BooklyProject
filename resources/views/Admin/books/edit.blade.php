@extends('admin.layout.master')

@section('title', 'Edit Book')

@section('content')
<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800">✏️ Edit Book</h1>

<form action="{{ route('admin.books.update',$book->id) }}"method="Post" enctype="multipart/form-data">
    @csrf
        @method('PUT')

        
        <div class="row">





        
            <!-- Book Title -->
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}" required>
            </div>

            <!-- Author -->
            <div class="col-md-6 mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $book->author) }}" required>
            </div>

            <!-- Price -->
            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $book->price) }}" required>
            </div>

            <!-- Quantity (Stock) -->
            <div class="col-md-6 mb-3">
                <label for="stock" class="form-label">Available Quantity</label>
                <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $book->stock) }}" min="0" required>
            </div>

            <!-- Category -->
            <div class="col-md-6 mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select a category</option>
                    <option value="1" {{ $book->category_id == 1 ? 'selected' : '' }}>Technology</option>
                    <option value="2" {{ $book->category_id == 2 ? 'selected' : '' }}>Religious</option>
                    <option value="3" {{ $book->category_id == 3 ? 'selected' : '' }}>Novels</option>
                    <option value="4" {{ $book->category_id == 4 ? 'selected' : '' }}>Children</option>
                    <option value="5" {{ $book->category_id == 5 ? 'selected' : '' }}>Academic</option>
                    <option value="6" {{ $book->category_id == 6 ? 'selected' : '' }}>Cultural</option>
                    <option value="7" {{ $book->category_id == 7 ? 'selected' : '' }}>Historical</option>
                    <option value="8" {{ $book->category_id == 8 ? 'selected' : '' }}>Political</option>
                </select>
            </div>
        </div>

<!--Book iamge-->
<div class="col-md-6 mb-3">
    <label for="iamge"class="form-label">Book Photo</label>
    <input type="file" name="image"id="image" class="form-control" accept="image/*">
    @if($book->image)
    <div class="mt-2">
<img src="{{ asset('images/books/').$book->image }}" alt="{{ $book->title }}" width="100"class="rounded">

    </div>
    @endif
</div>


        <button type="submit" class="btn btn-primary">Update Book</button>
        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection