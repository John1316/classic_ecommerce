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

Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.home');
    Route::resource('/admins', 'AdminsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/brands', 'BrandsController');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/products', 'ProductsController');
    Route::get('/products/deleteProductImages/{id}', 'ProductsController@deleteProductImages')->name('deleteProductImages');
    Route::delete('/products/recover/{id}', 'ProductsController@recover')->name('products.recover');
    Route::resource('/orders', 'OrdersController');
    Route::resource('/offers', 'OffersController');
    Route::resource('/branches', 'BranchesController');
    Route::resource('/settings', 'SettingsController');
    Route::resource('/coupons', 'CouponsController');
    Route::resource('/locations', 'LocationsController');
    Route::resource('/clients', 'ClientsController');
    Route::resource('/contact_us', 'ContactUsController');
    Route::resource('/banner_images', 'BannerImagesController');
    Route::resource('/main', 'MainController');
    Route::resource('/sliders', 'SlidersController');
});

view()->composer('*', function ($view) {
    if(auth()->user()) {
        if(auth()->user()->unConfirmedOrder() != NULL) {
            $order = auth()->user()->unConfirmedOrder();
            $subTotal = 0;
            $total = 0;
            $promoInNumber = NULL;
            foreach($order->order_details as $orderDetail) {
                $subTotal += $orderDetail->quantity * $orderDetail->price;
            }
            if($order->promo_code_id != NULL) {
                $promo = App\PromoCode::find($order->promo_code_id);
                $promoInNumber = $subTotal * ( $promo->percentage / 100 );
                $total = $subTotal - $promoInNumber;
            } else {
                $total = $subTotal;
            }

            $view->with('userOrder', $order);
            $view->with('userOrderSubTotal', $subTotal);
            $view->with('userOrderPromoInNumber', $promoInNumber);
            $view->with('userOrderTotal', $total);

        }
    }
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function() {
    Route::get('/', 'WelcomeController@welcome')->name('welcome');
    Route::get('/shop', 'WelcomeController@shop')->name('shop');
    Route::get('/branches', 'WelcomeController@branches')->name('branches');
    Route::get('/products/{product}', 'WelcomeController@productDetails')->name('productDetails');
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::post('/add-to-cart', 'CartController@addToCart')->name('add-to-cart');
    Route::post('/update-cart', 'CartController@updateCart')->name('update-cart');
    Route::get('/delete-from-cart/{id}', 'CartController@removeFromCart')->name('delete-from-cart');
    Route::post('/apply-coupon', 'CartController@applyCoupon')->name('apply-coupon');
    Route::get('/shipping-address', 'ShippingAddressController@index')->name('shipping-address');
    Route::post('/add-new-address', 'ShippingAddressController@addNewAddress')->name('add-new-address');
    Route::post('/confirm-shipping-address', 'ShippingAddressController@confirmShippingAddress')->name('confirm-shipping-address');
    Route::get('/checkout', 'CheckoutController@index')->name('checkout');
    Route::post('/confirm-checkout', 'CheckoutController@confirmCheckout')->name('confirm-checkout');

    Route::get('/profile', 'ProfileController@profile')->name('profile');
    Route::put('/update-profile', 'ProfileController@updateProfile')->name('update-profile');
    Route::put('/update-password', 'ProfileController@updatePassword')->name('update-password');
    
    Auth::routes();

    Route::get('/{brand}', 'WelcomeController@brands')->name('brands');
    Route::get('/{brand}/{category}', 'WelcomeController@categories')->name('categories');
});
