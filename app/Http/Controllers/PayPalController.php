<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
public function create(Request $request)
{
    try {
        $request->validate([
            'shipping_address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
        ]);
        
        // جلب السلة
        $cart = Cart::where('user_id', Auth::id())->first();
        
        if (!$cart || $cart->cartItems->count() == 0) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }
        
        // حساب الإجمالي
        $cartItems = $cart->cartItems()->with('book')->get();
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
        
        // إنشاء Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $total,
            'status' => 'pending',
            'payment_method' => 'paypal',
            'shipping_address' => $request->shipping_address,
            'address' => $request->shipping_address,
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
        
        // إعداد PayPal
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        
        if (!$token) {
            return redirect()->route('checkout')->with('error', 'PayPal authentication failed!');
        }
        
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => [[
                "reference_id" => "order_" . $order->id,
                "amount" => [
                    "currency_code" => "USD",
                    "value" => number_format($total, 2, '.', '')
                ]
            ]]
        ]);
        
        // التحقق من الاستجابة
        if (!isset($response['id'])) {
            \Log::error('PayPal Response Error', ['response' => $response]);
            return redirect()->route('checkout')->with('error', 'PayPal order creation failed! Please check your PayPal credentials.');
        }
        
        // حفظ PayPal Order ID
        $order->update(['paypal_order_id' => $response['id']]);
        
        // التوجيه لـ PayPal
        foreach ($response['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }
        
        return redirect()->route('checkout')->with('error', 'Could not redirect to PayPal!');
        
    } catch (\Exception $e) {
        \Log::error('PayPal Error: ' . $e->getMessage());
        return redirect()->route('checkout')->with('error', 'Payment error: ' . $e->getMessage());
    }
}




public function paymentSuccess(Request $request)
{
    try {
        Log::info('PaymentSuccess Request Data', $request->all());

        $userId = Auth::id();
        if (!$userId) {
            throw new \Exception('User not logged in');
        }

        $token = $request->input('token');
        if (!$token) {
            throw new \Exception('Invalid payment token');
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $accessToken = $provider->getAccessToken();
        Log::info('PayPal Access Token', ['token' => $accessToken]);

        $response = $provider->capturePaymentOrder($token);
        Log::info('PayPal Capture Response', ['response' => $response]);

        if (!isset($response['status']) || $response['status'] !== 'COMPLETED') {
            throw new \Exception('Payment not completed: ' . ($response['status'] ?? 'unknown'));
        }

        $order = Order::where('user_id', $userId)
                     ->where('status', 'pending')
                     ->where('payment_method', 'paypal')
                     ->latest()
                     ->first();

        if (!$order) {
            throw new \Exception('No pending order found');
        }

        $order->update([
            'status' => 'paid',
            'paypal_order_id' => $token
        ]);

        $cart = Cart::where('user_id', $userId)->first();
        if ($cart) {
            $cart->cartItems()->delete();
        }

        session()->forget('applied_promo');

        return redirect()->route('order.success')->with('success', 'Payment completed successfully!');

    } catch (\Exception $e) {
        // هنا بدل redirect، نعرض الخطأ مباشرة على الصفحة
        return response()->json([
            'error' => $e->getMessage(),
            'request' => $request->all(),
            'trace' => $e->getTraceAsString()
        ]);
    }
}


    

    public function paymentCancel()
    {
        return redirect()->route('checkout')->with('error', 'Payment was cancelled!');
 
        }


        
        }