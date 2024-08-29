<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Middleware\AdminAuthmMiddleware;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\HomeController;
use Modules\Admin\Http\Controllers\MasterCategoryController;
use Modules\Admin\Http\Controllers\CategoryController;
use Modules\Admin\Http\Controllers\SubcategoryController;
use Modules\Admin\Http\Controllers\ContactController;
use Modules\Admin\Http\Controllers\PanelSettingController;
use Modules\Admin\Http\Controllers\ApiKeyController;
use Modules\Admin\Http\Controllers\{ProductsController,BrandsController,AttributesController,ColorsController,OrdersController,CouponController,SizeController,AboutUsController,ContactUsController,TermsConditionsController,ShippingDeliveryController,ReturnsExchangesController};

Route::prefix('admin')->group(function() {
          Route::get('/', 'AdminController@index')->name('login');
          Route::post('/authenticate', 'AdminController@authenticate')->name('authenticate');    
          Route::middleware([AdminAuthmMiddleware::class])->group(function () {
          Route::get('/logout', 'AdminController@logout')->name('logout');        
          Route::resource('dashboard', 'HomeController')->except('show');
        /* Route::resource('contacts', 'ContactController')->except('show');
           Route::resource('panel-setting', 'PanelSettingController')->except('show');
           Route::resource('api-keys', 'ApiKeyController')->except('show');
        */
       
          Route::resource('master-categories', 'MasterCategoryController')->except('show');
          Route::resource('categories', 'CategoryController')->except('show');         
          Route::resource('sub-categories','SubcategoryController')->except('show');  
          Route::resource('brands', 'BrandsController')->except('show');  
         
         
          Route::post('/fetch-categories', 'ProductsController@fetchCategories')->name('fetch-categories');         
          Route::post('/fetch-sub-categories', 'ProductsController@fetchSubCategories')->name('fetch-sub-categories');

          Route::resource('products', 'ProductsController');
          Route::post('/delete-image', 'ProductsController@deleteImages')->name('delete-image');
          Route::post('/delete-specification', 'ProductsController@deleteSpecification')->name('delete-specification');
          Route::post('/delete-variation', 'ProductsController@deleteVariation')->name('delete-variation');
          
          Route::resource('attributes', 'AttributesController')->except('show');
          Route::resource('colors', 'ColorsController');   
          Route::resource('orders', 'OrdersController'); 
          Route::get('/all-notification', 'OrdersController@allNotification')->name('all-notification');
          Route::get('/all-notifications', 'OrdersController@getAllNotification')->name('all-notifications');
          Route::post('/order-status-update', 'OrdersController@orderStatusUpdate')->name('order-status-update');
          Route::resource('users', 'UserController')->except('show');
          Route::resource('coupons', 'CouponController'); 
          Route::resource('sizes', 'SizeController'); 
          Route::resource('aboutus', 'AboutUsController'); 
          Route::resource('contactus', 'ContactUsController'); 
          Route::resource('terms-conditions', 'TermsConditionsController');
          Route::resource('returns-exchanges', 'ReturnsExchangesController');
          Route::resource('shipping-delivery', 'ShippingDeliveryController');
          
          


    });
});
