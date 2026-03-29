@extends('User.layouts.master')

@section('title', 'Shopping Cart')

@section('extra-css')
    <style>
        .cart-item img {
            max-width: 100px;
            height: auto;
        }

        .quantity-input {
            max-width: 70px;
        }

        .cart-summary {
            background-color: #f8f9fa;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')

    <h1 class="mb-5 text-center fw-bold">Your Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Cart Items -->
        <div class="col-lg-8">

            @if($cartItems->count() > 0)
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">

                        @foreach($cartItems as $index => $item)
                            <div class="row cart-item align-items-center @if($index > 0) mb-4 @endif">
                                <div class="col-3 col-md-2">
                                    <img src="{{ asset('images/books/' . $item->book->image) }}" 
                                         alt="{{ $item->book->title }}" 
                                         class="img-fluid rounded">
                                </div>
                                <div class="col-6 col-md-5">
                                    <h5 class="card-title mb-1">{{ $item->book->title }}</h5>
                                    <p class="text-dark small mb-1">Author: {{ $item->book->author }}</p>
                                </div>

                                <div class="col-3 col-md-2 text-center">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" id="update-form-{{ $item->id }}">
                                        @csrf
                                        @method('PATCH')

                                    </form>
                                </div>

                                <div class="col-3 col-md-2 text-end">
                                    <p class="fw-bold mb-1">JOD {{ number_format($item->price * $item->quantity, 2) }}</p>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                onclick="return confirm('Are you sure you want to remove this item?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>







                                
                            </div>
                            
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach

                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('shop') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i> Continue Shopping
                    </a>
                </div>

            @else
                <div class="card shadow-sm">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-cart-x" style="font-size: 4rem; color: #ccc;"></i>
                        <h4 class="mt-3">Your cart is empty</h4>
                        <p class="text-muted">Add some books to your cart to get started!</p>
                        <a href="{{ route('shop') }}" class="btn btn-primary mt-3">
                            Start Shopping
                        </a>
                    </div>
                </div>
            @endif

        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card cart-summary shadow-sm sticky-top" style="top: 20px;">
                <div class="card-body">
                    <h5 class="card-title mb-4">Order Summary</h5>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <span>JOD {{ number_format($subtotal, 2) }}</span>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between mb-4 fw-bold fs-5">
                        <span>Total</span>
                        <span>JOD {{ number_format($subtotal, 2) }}</span>
                    </div>

                    @if($cartItems->count() > 0)
                        <a href="{{ route('checkout') }}" class="btn btn-primary w-100 py-3">
                            Proceed to Checkout
                        </a>
                    @else
                        <button class="btn btn-secondary w-100 py-3" disabled>
                            Cart is Empty
                        </button>
                    @endif
                </div>
            </div>

            <!-- Promo Code -->
      
        </div>
    </div>

@endsection

@section('extra-js')
    <script>
function updateQuantity(itemId, currentQty, change) {
    let qtyInput = document.getElementById('quantity-' + itemId);
    let newQty = parseInt(qtyInput.value) + change;

    if (newQty >= 1) {
        qtyInput.value = newQty;
        document.getElementById('update-form-' + itemId).submit();
    }
}

    </script>
@endsection