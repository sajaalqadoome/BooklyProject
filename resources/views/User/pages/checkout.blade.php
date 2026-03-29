@php
    // جلب السلة
    $cart = \App\Models\Cart::where('user_id', Auth::id())->first();
    
    if ($cart && $cart->cartItems->count() > 0) {
        $cartItems = $cart->cartItems;
        $subtotal = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        
        // حساب الخصم
        $discount = 0;
        if (session()->has('applied_promo')) {
            $promo = session('applied_promo');
            if (isset($promo['discount_amount'])) {
                $discount = min($promo['discount_amount'], $subtotal);
            } elseif (isset($promo['discount_percent'])) {
                $discount = ($subtotal * $promo['discount_percent']) / 100;
            }
        }
        
        $shipping = 5.00;
        $tax = ($subtotal - $discount) * 0.16;
        $total = ($subtotal - $discount) + $shipping + $tax;
    } else {
        $total = 0;
    }
@endphp

<style>
    .card-details {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .card-details .title {
        font-size: 24px;
        font-weight: 700;
        color: #333;
        margin-bottom: 25px;
        text-align: center;
        border-bottom: 2px solid #0070ba;
        padding-bottom: 15px;
    }
    
    .alert {
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 25px;
    }
    
    .alert-info {
        background-color: #e7f3ff;
        border: 1px solid #0070ba;
        color: #004c8c;
    }
    
    .alert-info i {
        font-size: 20px;
        margin-right: 8px;
        color: #0070ba;
    }
    
    .alert-info p {
        margin: 8px 0;
        font-size: 15px;
    }
    
    .alert-info p strong {
        font-weight: 700;
        color: #003d73;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        font-weight: 600;
        color: #444;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 15px;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #0070ba;
        box-shadow: 0 0 0 3px rgba(0,112,186,0.1);
    }
    
    .btn {
        cursor: pointer;
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
        text-align: center;
        text-decoration: none;
    }
    
    .btn-danger {
        background: linear-gradient(135deg, #0070ba 0%, #003d73 100%);
        color: white;
    }
    
    .btn-danger:hover {
        background: linear-gradient(135deg, #005a94 0%, #002d54 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,112,186,0.3);
    }
    
    .btn-block {
        width: 100%;
        display: block;
    }
    
    .btn-lg {
        padding: 15px 30px;
        font-size: 18px;
        border-radius: 8px;
    }
    
    .btn-danger i {
        margin-right: 10px;
        font-size: 20px;
    }
    
    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }
    
    .col-sm-12 {
        flex: 0 0 100%;
        max-width: 100%;
        padding: 0 10px;
    }
    
    @media (max-width: 768px) {
        .card-details {
            padding: 20px;
        }
        
        .card-details .title {
            font-size: 20px;
        }
        
        .btn-lg {
            padding: 12px 20px;
            font-size: 16px;
        }
    }
</style>

<form action="{{ route('paypal.create') }}" method="POST">
    @csrf
    
    <input type="hidden" name="payment_method" value="paypal">
    
    <div class="card-details">
        <h3 class="title">PayPal Payment</h3>
        
        <div class="alert alert-info">
            <p><i class="fab fa-paypal"></i> You will be redirectored to PayPal to complete your payment securely.</p>
            <p><strong>Total Amount:</strong> ${{ number_format($total, 2) }}</p>
        </div>
        
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="shipping_address">Shipping Address</label>
                <input type="text" name="shipping_address" class="form-control" placeholder="Enter your shipping address" required>
            </div>
            
            <div class="form-group col-sm-12">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" required>
            </div>
            
            <div class="form-group col-sm-12">
                <button type="submit" class="btn btn-danger btn-block btn-lg">
                    <i class="fab fa-paypal"></i> Pay with PayPal
                </button>
            </div>
        </div>
    </div>
</form>