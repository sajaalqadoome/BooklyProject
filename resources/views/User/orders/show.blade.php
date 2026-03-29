@extends('User.layouts.master')

@section('title', 'Order Details')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Order #{{ $order->id }}</h2>
                <a href="{{ route('user.orders.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Orders
                </a>
            </div>
            
        
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Order Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Order Date:</strong> {{ $order->created_at->format('d M, Y h:i A') }}</p>
                            <p><strong>Order Status:</strong> 
                                @if($order->status == 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-warning">{{ ucfirst($order->status) }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Total Amount:</strong> <span class="text-primary fs-4">JOD {{ number_format($order->total_amount, 2) }}</span></p>
                            <p><strong>Shipping Address:</strong> {{ $order->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
   
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Order Items</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($item->book)
                                            <img src="{{ asset('images/books/' . $item->book->image) }}" 
                                                 alt="{{ $item->book->title }}" 
                                                 class="me-3"
                                                 style="width: 50px; height: 70px; object-fit: cover;">
                                            <div>
                                                <h6 class="mb-0">{{ $item->book->title }}</h6>
                                                <small class="text-muted">{{ $item->book->author }}</small>
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>JOD {{ number_format($item->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td><strong>JOD {{ number_format($item->price * $item->quantity, 2) }}</strong></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong class="text-primary fs-5">JOD {{ number_format($order->total_amount, 2) }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection