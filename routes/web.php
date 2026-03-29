<?php
use App\Http\Controllers\WishlistController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController as UserOrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
// الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', fn() => view('User.pages.blog'))->name('blog');
Route::get('/shop', [BookController::class, 'shop'])->name('shop');
Route::get('/about', fn() => view('User.pages.about'))->name('about');
Route::get('/contact', fn() => view('User.pages.contact'))->name('contact');
Route::get('/product/{id}', [BookController::class, 'showProduct'])->name('product.single');
Route::get('/book/{id}/read', [BookController::class, 'readBook'])->name('book.read');

// Routes للمستخدمين المسجلين فقط
Route::middleware('auth')->group(function () {
    // Cart Routes
    Route::post('/cart/add/{bookId}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/promo', [CartController::class, 'applyPromo'])->name('cart.applyPromo');

    // Orders للمستخدم
    Route::get('/my-orders', [UserOrderController::class, 'index'])->name('user.orders.index');
    Route::get('/my-orders/{id}', [UserOrderController::class, 'show'])->name('orders.show');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/payment', [CheckoutController::class, 'store'])->name('checkout.payment.store');
    Route::get('/order/success', [CheckoutController::class, 'success'])->name('order.success');

    // Favorites
   // Route::get('/Fav', fn() => view('User.pages.Fav'))->name('Fav');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('books', BookController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
Route::post('/orders/{id}/status', [AdminOrderController::class, 'updateOrderStatus'])->name('orders.status.update');

    });


require __DIR__.'/auth.php';
Route::post('/paypal/create', [PayPalController::class, 'create'])->name('paypal.create');
Route::get('/paypal/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.success');
Route::get('/paypal/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.cancel');



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [ShopController::class, 'index'])->name('shop.search');  

Route::post('/books/{book}/comments', [CommentController::class, 'store'])
    ->name('comments.store');

// في routes/web.php
Route::middleware(['auth'])->group(function () {
    // عرض صفحة المفضلة (GET)
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    
    // إضافة كتاب للمفضلة (POST)
    Route::post('/wishlist/add/{book}', [WishlistController::class, 'add'])->name('wishlist.add');
    
    // إزالة كتاب من المفضلة (DELETE)
    Route::delete('/wishlist/remove/{book}', [WishlistController::class, 'remove'])->name('wishlist.remove');
});