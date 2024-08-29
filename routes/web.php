<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AccountAddresses,AccountCreate,AccountDetails,AccountHistory,AccountNotification,AccountReview,AccountWishlist,Cart,Category,Home,Dashboard,Checkout,Product,Login,Order,AjaxController,OrderProductRating,ForgetPassword,AboutUs,ContactUs,TermsConditions,ReturnsExchanges,ShippingDelivery};
use Modules\Admin\Http\Controllers\DropdownController;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
  Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
   return "Cache cleared successfully";
});
   Route::resource('/',  Home::class);
   Route::resource('/home',  Home::class);
   Route::resource('/about-us',  AboutUs::class);
   Route::resource('/contact-us',  ContactUs::class);
   Route::resource('/terms-and-Conditions',  TermsConditions::class);
   Route::resource('/returns-and-exchanges',  ReturnsExchanges::class);
   Route::resource('/shipping-and-delivery',  ShippingDelivery::class);
   Route::middleware([PreventBackHistory::class])->group(function () {
   
       Route::resource('/account-addresses',  AccountAddresses::class);
       Route::resource('/account-create',  AccountCreate::class);
       Route::resource('/account-details',  AccountDetails::class);
       Route::resource('/account-history',  AccountHistory::class);
       Route::resource('/account-notification',  AccountNotification::class);
       Route::resource('/account-review',  AccountReview::class);
       Route::resource('/account-wishlist',  AccountWishlist::class);
       Route::resource('/cart',  Cart::class);
       Route::resource('/dashboard',  Dashboard::class);
       Route::resource('/checkout',  Checkout::class);
       Route::get('/thank-you',[Checkout::class, 'orderedThankYou'])->name('thank-you');  
       Route::resource('/order-details',  Order::class);
       Route::get('dashboard', [Dashboard::class, 'index'])->name('user.dashboard');       
       Route::post('/order/filter',[AccountHistory::class, 'filter'])->name('order.filter');
       Route::resource('/order-product-rating',  OrderProductRating::class);
      
       Route::get('cancel-payment', [Checkout::class, 'paymentCancel'])->name('cancel.payment');
       Route::get('payment-success', [Checkout::class, 'paymentSuccess'])->name('success.payment');
       
       Route::post('/coupon-apply',[Cart::class, 'couponApply'])->name('cart.coupon-apply');
       Route::post('/user-checkout',[Checkout::class, 'userCheckout'])->name('checkout.user-checkout');
       Route::post('/check-stock',[Product::class, 'checkProductStock'])->name('check-stock');

  })->middleware('auth');
   Route::resource('/category',  Category::class);  
   Route::resource('/product',  Product::class);
   Route::post('/auto-suggestion-product',[Product::class, 'productSuggestions'])->name('auto-suggestion-product');
   Route::resource('/login',  Login::class);   
  
   Route::resource('/ajax-quickview',  AjaxController::class);
   Route::get('logout', [Login::class, 'logout'])->name('user.logout');
   Route::get('profile-edit', [AccountCreate::class, 'show'])->name('profile-edit');

   Route::post('/category/filter',[Category::class, 'filter'])->name('category.filter');
   Route::post('/category/filterByMastercategory',[Category::class, 'filterByMastercategory'])->name('category.filterByMastercategory');
   Route::post('/fetch-states',[DropdownController::class, 'fetchState'])->name('fetch-states');

   Route::resource('/forgot-password',  ForgetPassword::class);  
   Route::get('/email-otp', [ForgetPassword::class, 'emailOtp'])->name('email-otp');
   Route::get('/resend-otp/{email?}', [ForgetPassword::class, 'resendOtp'])->name('resend-otp');
   Route::get('/verify-otp', [ForgetPassword::class, 'verifyOtp'])->name('verify-otp');
   Route::post('/verify-otp', [ForgetPassword::class, 'verifyOtpMatch'])->name('verify-otp');
   Route::get('/change-password', [ForgetPassword::class, 'changePassword'])->name('change-password');
   Route::post('/change-password', [ForgetPassword::class, 'updatePassword'])->name('change-password');
   
  /* Route::get('/apple-developer-merchantid-domain-association', function () {
    $json = file_get_contents(base_path('.well-known/apple-developer-merchantid-domain-association.txt'));
    return response($json, 200)
        ->header('Content-Type', 'application/json');
});*/

    
   
   
   