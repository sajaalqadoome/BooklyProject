@extends('User.layouts.master')

@section('title', $book->title ?? 'Product Details')


@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-image text-center">
                    <img src="{{ asset('images/books/' . $book->image) }}" 
                         alt="{{ $book->title }}" 
                         class="img-fluid rounded shadow"
                         style="max-height: 500px; object-fit: contain;">
                </div>
            </div>
            
          
            <div class="col-md-6">
                <div class="product-details">
                    <h1 class="mb-3">{{ $book->title }}</h1>
                    <p class="text-dark fs-5 mb-3">By {{ $book->author }}</p>
                    
                    <div class="rating text-warning mb-3 d-flex align-items-center">
                        @for($i = 1; $i <= 5; $i++)
                        <svg class="star star-fill" width="20" height="20">
                            <use xlink:href="#star-fill"></use>
                        </svg>
                        @endfor
                        <span class="text-dark ms-2">(5.0)</span>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-primary fw-bold">
                            JOD {{ number_format($book->price, 2) }}
                        </h3>
                        
                 
                    </div>
                    
<div class="mb-4">
    <h5>Description</h5>
    <p class="text-muted" style="color: black !important;">
        {{ $book->description ?? 'No description available for this book.' }}
    </p>
</div>

@if($book->pdf_file)
<div class="mt-3">
    <a href="{{ asset('pdfs/books/' . $book->pdf_file) }}" 
       target="_blank" 
       class="btn btn-success btn-lg w-100">
        <i class="fas fa-book-reader me-2"></i>
        Read Book (PDF)
    </a>
</div>
@endif

                    
                    <form action="{{ route('cart.add', $book->id) }}" method="POST">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" 
                                       name="quantity" 
                                       value="1" 
                                       min="1" 
                                       max="10 " 
                                       class="form-control form-control-lg">
                            </div>
                            <div class="col-md-8 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <svg class="cart me-2" width="20" height="20">
                                        <use xlink:href="#cart"></use>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- زر المفضلة -->
         
                    
                    <div class="mt-4 p-3 bg-light rounded">
                        <h6 class="mb-2">Product Details:</h6>
                        <ul class="list-unstyled mb-0">
                            <li><strong>Category:</strong> {{ $book->category->name ?? 'N/A' }}</li>
                            <li><strong>Author:</strong> {{ $book->author }}</li>
                            <li><strong>Availability:</strong> 
                                @if($book->stock > 0)
                                    <span class="text-success">In Stock</span>
                                @else
                                    <span class="text-danger">Out of Stock</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
   
    </div>
</section>





<section class="py-5 border-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Comments ({{ $book->comments->count() }})</h2>

             
                @if($book->comments->count() > 0)
                    @foreach($book->comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px; font-weight: bold;">
                                            {{ strtoupper(substr($comment->user->name ?? 'U', 0, 1)) }}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0">{{ $comment->user->name ?? ' unknow' }}</h5>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                <p class="mt-2 mb-0">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info">No comment until now
                    </div>
                @endif

                
                @auth
                    <div class="card mt-4">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Add your comment </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('comments.store', $book) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">comment</label>
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" 
                                              rows="4" placeholder="Write Your comment" required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-paper-plane me-2"></i> submit
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning mt-4">
                        <i class="fas fa-info-circle me-2"></i>
                         <a href="{{ route('login') }}" class="text-decoration-none"> must be to login</a> 
                    </div>
                @endauth
            </div>
        </div>
    </div>
</section>
@endsection

