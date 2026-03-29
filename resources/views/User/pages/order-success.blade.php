<!D<!DOCTYPE html>
@extends('user.layouts.app')

@section('content')
<style>
    .success-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
        padding: 40px 20px;
    }
    
    .success-card {
        border: none;
        border-radius: 25px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        direction: ltr;
        text-align: center;
        background: white;
        overflow: hidden;
        position: relative;
    }

    .success-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #56ab2f 0%, #a8e063 50%, #56ab2f 100%);
        background-size: 200% 100%;
        animation: gradient-shift 3s ease infinite;
    }

    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .success-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
    }
    
    .success-icon-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 30px;
    }

    .success-icon {
        font-size: 100px;
        animation: bounce-in 0.8s ease-out;
        position: relative;
        z-index: 2;
    }

    .success-icon-bg {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 180px;
        height: 180px;
        background: linear-gradient(135deg, #56ab2f15 0%, #a8e06315 100%);
        border-radius: 50%;
        z-index: 1;
        animation: pulse-bg 2s ease-in-out infinite;
    }

    @keyframes bounce-in {
        0% {
            transform: scale(0);
            opacity: 0;
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes pulse-bg {
        0%, 100% {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0.3;
        }
        50% {
            transform: translate(-50%, -50%) scale(1.1);
            opacity: 0.5;
        }
    }
    
    .success-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 20px;
        animation: slide-up 0.6s ease-out 0.2s backwards;
    }

    .success-subtitle {
        font-size: 1.3rem;
        color: #6c757d;
        margin-bottom: 30px;
        animation: slide-up 0.6s ease-out 0.4s backwards;
    }

    @keyframes slide-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .btn-custom {
        border-radius: 50px;
        padding: 14px 40px;
        font-weight: 700;
        font-size: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        border: none;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .btn-custom::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
        z-index: -1;
    }

    .btn-custom:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .btn-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
    }

    .btn-custom:active {
        transform: translateY(-1px);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #5568d3 0%, #65408b 100%);
    }
    
    .btn-success {
        background: linear-gradient(135deg, #56ab2f 0%, #a8e063 100%);
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #4a9428 0%, #96ca55 100%);
    }
    
    .btn-outline-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
        color: white;
    }

    .btn-outline-secondary:hover {
        background: linear-gradient(135deg, #5a6268 0%, #495057 100%);
        color: white;
    }
    
    .alert-custom {
        border-radius: 15px;
        border: none;
        border-left: 5px solid;
        padding: 20px 25px;
        direction: ltr;
        text-align: left;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        animation: slide-up 0.6s ease-out 0.6s backwards;
        font-size: 15px;
    }

    .alert-success {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        border-left-color: #28a745;
        color: #155724;
    }

    .alert-info {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        border-left-color: #17a2b8;
        color: #0c5460;
    }

    .text-ltr {
        direction: ltr;
        text-align: center;
    }

    .divider-custom {
        margin: 40px 0;
        border: none;
        height: 2px;
        background: linear-gradient(90deg, transparent 0%, #dee2e6 50%, transparent 100%);
        opacity: 0.5;
    }

    .buttons-wrapper {
        animation: slide-up 0.6s ease-out 0.8s backwards;
    }

    .btn-custom i {
        transition: transform 0.3s ease;
    }

    .btn-custom:hover i {
        transform: scale(1.2);
    }

    @media (max-width: 768px) {
        .success-title {
            font-size: 2rem;
        }

        .success-subtitle {
            font-size: 1.1rem;
        }

        .success-icon {
            font-size: 80px;
        }

        .btn-custom {
            padding: 12px 30px;
            font-size: 14px;
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>

<div class="success-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="card success-card">
                    <div class="card-body p-5 text-center">
                        <!-- Success Icon -->
                        <div class="success-icon-wrapper">
                            <div class="success-icon-bg"></div>
                            <i class="fas fa-check-circle text-success success-icon"></i>
                        </div>
                        
                        <!-- Title -->
                        <h1 class="success-title text-ltr">
                            <i class="fas fa-check me-2"></i> Payment Successful!
                        </h1>
                        
                        <!-- Subtitle -->
                        <p class="success-subtitle text-ltr">
                            Thank you for your purchase!
                        </p>
                        
                        <!-- Message -->
                        <div class="alert alert-success alert-custom" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            Your order has been confirmed and will be processed soon.
                        </div>
                        
                        <!-- Session Success Message -->
                        @if(session('success'))
                            <div class="alert alert-info alert-custom mt-3" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <!-- Divider -->
                        <hr class="divider-custom">
                        
                        <!-- Action Buttons -->
                        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4 buttons-wrapper">
                            <a href="{{ route('user.orders.index') }}" class="btn btn-primary btn-custom">
                                <i class="fas fa-list-alt me-2"></i> View My Orders
                            </a>
                            
                            <a href="{{ route('shop') }}" class="btn btn-success btn-custom">
                                <i class="fas fa-shopping-bag me-2"></i> Continue Shopping
                            </a>
                            
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-custom">
                                <i class="fas fa-home me-2"></i> Back to Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection