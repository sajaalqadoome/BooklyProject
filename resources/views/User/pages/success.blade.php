@extends('User.layouts.master')

@section('title', 'Order Success')

@section('extra-css')
<style>
    .success-page {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px 0;
    }
    .success-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        padding: 50px;
        text-align: center;
        max-width: 600px;
        margin: 0 auto;
    }
    .success-icon {
        width: 80px;
        height: 80px;
        background: #28a745;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
    }
    .success-icon i {
        font-size: 40px;
        color: white;
    }
    .success-card h1 {
        color: #28a745;
        margin-bottom: 20px;
    }
    .success-card p {
        color: #666;
        font-size: 18px;
        margin-bottom: 30px;
    }
    .order-details {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin: 20px 0;
    }
    .order-details p {
        margin: 10px 0;
        font-size: 16px;
    }
    .btn-group {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 30px;
    }
</style>
@endsection

@section('content')
<div class="success-page">
    <div class="container">
        <div class="success-card">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            
            <h1>Payment Successful!</h1>
            <p>Thank you for your order. Your payment has been processed successfully.</p>
            
            @if(session('order_id'))
            <div class="order-details">
                <p><strong>Order Number:</strong> #{{ session('order_id') }}</p>
                <p><strong>Date:</strong> {{ date('F d, Y') }}</p>
                <p><strong>Status:</strong> <span class="badge badge-success">Paid</span></p>
            </div>
            @endif
            
            <p>You will receive an email confirmation shortly with your order details.</p>
            
            <div class="btn-group">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i class="fas fa-home"></i> Back to Home
                </a>
                <a href="{{ route('shop') }}" class="btn btn-outline-primary">
                    <i class="fas fa-shopping-bag"></i> Continue Shopping
                </a>
            </div>
        </div>
    </div>
</div>
@endsection