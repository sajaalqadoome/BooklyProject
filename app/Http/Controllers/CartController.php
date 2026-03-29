<?php

namespace App\Http\Controllers;
use App\Models\PromoCode;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rules\Can;

class CartController extends Controller
{
   public function index()
{
    $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
    $cartItems = $cart->cartItems()->with('book')->get();
    $subtotal = $cartItems->sum(fn($item) => $item->price * $item->quantity);

    return view('user.pages.cart', compact('cartItems', 'subtotal'));
}

public function add(Request $requset,$bookId)
        {
            $book=Book::findOrFail($bookId);
            $cart=Cart::firstOrCreate(['user_id'=>Auth::id()]);
            $quantity=$requset->integer('quantity',1);
            $cartItem = CartItem::where('cart_id', $cart->id)
                    ->where('book_id', $bookId)
                    ->first();         
            if($cartItem)
                {
                 $cartItem->increment('quantity',$quantity);
                }
                else{
                    CartItem::create([
                    'cart_id'=>$cart->id,
                    'book_id'=>$bookId,
                    'quantity'=>$quantity,
                    'price'=>$book->price
                    ]);
                }
                $cartCount=CartItem::where('cart_id',$cart->id)->sum('quantity');
                        return redirect()->back()->with('success', 'Book added to cart successfully!');}
public function update(Request $request, $id)
{
    $cartItem = CartItem::whereHas('cart', function ($query) {
        $query->where('user_id', Auth::id());
    })->findOrFail($id);

    $cartItem->quantity = max(1, $request->quantity); 
    $cartItem->save();

    return redirect()->back()->with('success', 'Cart updated!');
}





public function remove($id)
{
    $cartItem=CartItem::whereHas('cart',function($query)
    {
        $query->where('user_id',Auth::id());

    })->findOrFail($id);
    $cartItem->delete();
    return back()->with('success','The item was successfully removed from the basket.');
}
        }

