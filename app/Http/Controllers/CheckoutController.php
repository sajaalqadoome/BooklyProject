<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        
        if (!$cart || $cart->cartItems->count() == 0) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }
        
        $cartItems = $cart->cartItems()->with('book')->get();
        $subtotal = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        
 
        return view('user.pages.checkout', compact('cartItems', 'subtotal'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:cash,paypal',
            'shipping_address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
        ]);
        
        $cart = Cart::where('user_id', Auth::id())->first();
        
        if (!$cart || $cart->cartItems->count() == 0) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }
        
        // حساب الإجمالي
        $cartItems = $cart->cartItems()->with('book')->get();
        $subtotal = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $discount = session('applied_promo.discount_amount', 0);
        $shipping = 5.00;
        $tax = ($subtotal - $discount) * 0.16;
        $total = ($subtotal - $discount) + $shipping + $tax;
        
        // إنشاء Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'shipping_address' => $request->shipping_address,
            'phone' => $request->phone,
        ]);
        
        // إضافة Order Items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $item->book_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }
        
        // حسب طريقة الدفع
        if ($request->payment_method == 'paypal') {
            return $this->processPayPalPayment($order);
        } else {
            // Cash on Delivery
            $cart->cartItems()->delete();
            return redirect()->route('order.success')->with('success', 'Order placed successfully!');
        }
    }
    
    private function processPayPalPayment($order)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($order->total_amount, 2, '.', '')
                    ]
                ]
            ]
        ]);
        
        if (isset($response['id']) && $response['id'] != null) {
            // حفظ PayPal Order ID
            $order->update(['paypal_order_id' => $response['id']]);
            
            // التوجيه لـ PayPal
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
        
        return redirect()->route('checkout')->with('error', 'Something went wrong with PayPal!');
    }
    
    public function paypalSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        
        $response = $provider->capturePaymentOrder($request->token);
        
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $order = Order::where('paypal_order_id', $request->token)->first();
            
            if ($order) {
                $order->update(['status' => 'completed']);
                
                // حذف السلة
                $cart = Cart::where('user_id', Auth::id())->first();
                if ($cart) {
                    $cart->cartItems()->delete();
                }
                
                return redirect()->route('order.success')->with('success', 'Payment successful!');
            }
        }
        
        return redirect()->route('checkout')->with('error', 'Payment failed!');
    }
    
    public function paypalCancel()
    {
        return redirect()->route('checkout')->with('error', 'Payment cancelled!');
    }
    
    public function success()
    {
        return view('user.pages.order-success');
    }
}