@extends('admin.layout.master')

@section('title', 'Add New Book')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Add New Book to Store</h1>

    <div class="row">
        <div class="col-lg-8"> 
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Book Details</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="bookName">Book Title</label>
                            <input type="text" name="title" class="form-control" id="bookName"
                                placeholder="Enter full book title" required>
                        </div>

                        <div class="form-group">
                            <label for="bookName">Book Auth</label>
                            <input type="text" name="author" class="form-control" id="bookName"
                                placeholder="Enter Writer" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bookPrice">Price (JOD)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="price" step="0.01" class="form-control" id="bookPrice"
                                            placeholder="0.00" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bookQty">Available Quantity</label>
                                    <input type="number" name="stock" class="form-control" id="bookQty"
                                        placeholder="e.g. 50" required>
                                </div>
                            </div>
                        </div>

        <div class="form-group">
        <label for="categorySelect">Category</label>
        <select name="category_id" class="form-control" id="categorySelect" required>
        <option value="1">Technology</option>
        <option value="2">Religious</option>
        <option value="3">Novels</option>
        <option value="4">Children</option>
        <option value="5">Academic</option>
        <option value="6">Cultural</option>
        <option value="7">Historical</option>
        <option value="8">Political</option>
        </select>
        </div>

                        <div class="form-group">
                            <label for="descriptionTextarea">Short Description</label>
                            <textarea name="description" class="form-control" id="descriptionTextarea" rows="4"
                                placeholder="Write a summary..."></textarea>
                        </div>

<div class="form-group">
    <label for="pdf_file">PDF File (Optional)</label>
    <input type="file" name="pdf_file" class="form-control" accept=".pdf">
</div>

<div class="col-md-6 mb-3">
    <label for="image"class="form-label">Add phote</label>
    <input type="file" name="image"id="image"class="form-control" accept="image/*">

    </div>



                        <hr>
                        <button type="submit" class="btn btn-primary">Save Book</button>
                        <a href="{{ url('/table') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection