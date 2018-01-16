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


Route::middleware(['web'])
->namespace('\Front')
->group(function () {

    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    // START SCHOENGEBRAUCHT CATEGORY FRONT ROUTES /
    Route::get('get_price_ranges', 'CategoryViewController@getPriceRanges');
    
    Route::get('/category',  ['as' => 'all.category.view',
        'uses' => 'CategoryViewController@allCategoryView']);
    Route::get('/category/{slug}',  ['as' => 'category.view',
        'uses' => 'CategoryViewController@view']);
    Route::get('/product/{slug}',   ['as' => 'product.view',
        'uses' => 'ProductViewController@view']);
    Route::get('/product-search',   ['as' => 'search.result',
        'uses' => 'SearchController@result']);

    Route::post('/product/send/email', ['as' => 'product.mail', 'uses' => 'ProductViewController@sendMail']);

        // END SCHOENGEBRAUCHT CATEGORY FRONT ROUTES //

        //* ***** START SCHOENGEBRAUCHT CART FRONT ROUTES  *****  */

    Route::post('/add-to-cart', ['as' => 'cart.add-to-cart', 'uses' => 'CartController@addToCart']);

    Route::get('/cart/view', ['as' => 'cart.view', 'uses' => 'CartController@view']);

    Route::post('/cart/update', ['as' => 'cart.update', 'uses' => 'CartController@update']);

    Route::get('/cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);

    Route::post('/cart/update/delivery', ['as' => 'cart.update.delivery', 'uses' => 'CartController@updateDelivery']);

    Route::post('/order', ['as' => 'order.place', 'uses' => 'OrderController@place']);

        //* ***** END SCHOENGEBRAUCHT CART FRONT ROUTES  *****  */

    Route::get('/checkout', ['as' => 'checkout.index', 'uses' => 'CheckoutController@index']);

    Route::get('/uber-uns', ['as' => 'about-us', 'uses' => 'PageController@about']);

    Route::get('/wir-kaufen', ['as' => 'wir-kaufen', 'uses' => 'PageController@wirKaufen']);

    Route::post('/wir-kaufen/send/email', ['as' => 'wir-kaufen.mail', 'uses' => 'PageController@sendWirEmail']);

    Route::get('/kontakt', ['as' => 'contact', 'uses' => 'PageController@contact']);

    Route::post('/kontakt/send/email', ['as' => 'contact.email', 'uses' => 'PageController@sendContactEmail']);

    Route::get('/page/{slug}', ['as' => 'page.show', 'uses' => 'PageController@show']);

    Route::post('/subscribe', ['as' => 'subscribe', 'uses' => 'PageController@subscribe']);
});

Route::middleware(['web'])
->namespace('\Front\Auth')
->group(function () {



    Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('/login', ['as' => 'login.post', 'uses' => 'LoginController@authenticate']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

    Route::get('/register', ['as' => 'register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('/register', ['as' => 'register.post', 'uses' => 'RegisterController@register']);

    Route::get('/verifyemail/{token}', 'RegisterController@verify');
});

Route::middleware(['web', 'front.auth'])
->namespace('\Front')
->group(function() {

    Route::get('my-account', ['as' => 'my-account.home', 'uses' => 'MyAccountController@home']);

    Route::get('/my-account/edit', ['as' => 'my-account.edit', 'uses' => 'MyAccountController@edit']);
    Route::post('/my-account/edit', ['as' => 'my-account.store', 'uses' => 'MyAccountController@store']);

    Route::get('/my-account/upload-image', ['as' => 'my-account.upload-image', 'uses' => 'MyAccountController@uploadImage']);
    Route::post('/my-account/upload-image', ['as' => 'my-account.upload-image.post', 'uses' => 'MyAccountController@uploadImagePost']);

    Route::resource('/my-account/address', 'AddressController', ['as' => 'my-account']);

    Route::get('/my-account/order', ['as' => 'my-account.orders', 'uses' => 'MyAccountController@orders']);
    Route::get('/my-account/order/{id}', ['as' => 'my-account.order.view', 'uses' => 'MyAccountController@orderView']);

    Route::get('/my-account/change-password', ['as' => 'my-account.change-password', 'uses' => 'MyAccountController@changePassword']);
    Route::post('/my-account/change-password', ['as' => 'my-account.change-password.post', 'uses' => 'MyAccountController@changePasswordPost']);
});



Route::middleware(['web'])
->prefix('admin')
->namespace('\Admin')
->group(function () {

    Route::get('login', ['as' => 'admin.login', 'uses' => 'LoginController@loginForm']);
    Route::post('login', ['as' => 'admin.login.post', 'uses' => 'LoginController@login']);
    Route::get('logout', ['as' => 'admin.logout', 'uses' => 'LoginController@logout']);

    Route::get('password/reset', ['as' => 'admin.password.reset', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
});

Route::middleware(['web', 'admin.auth'])
->prefix('admin')
->namespace('\Admin')
->group(function () {
    Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);

    Route::resource('category', 'CategoryController', ['as' => 'admin']);

    Route::resource('product', 'ProductController', ['as' => 'admin']);
    Route::post('product-image/upload', ['as' => 'admin.product.upload-image',
        'uses' => 'ProductController@uploadImage']);
    Route::post('product-image/delete', ['as' => 'admin.product.delete-image',
        'uses' => 'ProductController@deleteImage']);

    Route::resource('/admin-user', 'AdminUserController', ['as' => 'admin']);
    Route::resource('/change-password', 'ChangePasswordController', ['as' => 'admin']);

    Route::post('/change-password', ['as' => 'admin.change.password','uses' => 'ChangePasswordController@update']);

    Route::get('order', ['as' => 'admin.order.index', 'uses' => 'OrderController@index']);
    Route::get('order/{id}', ['as' => 'admin.order.view', 'uses' => 'OrderController@view']);
    Route::get('order/{id}/send-email-invoice', ['as' => 'admin.order.send-email-invoice', 'uses' => 'OrderController@sendEmailInvoice']);
    Route::get('order/{id}/change-status', ['as' => 'admin.order.change-status', 'uses' => 'OrderController@changeStatus']);
    Route::put('order/{id}/update-status', ['as' => 'admin.order.update-status', 'uses' => 'OrderController@updateStatus']);

    Route::get('buyer', ['as' => 'admin.buyer.index', 'uses' => 'BuyerController@index']);
    Route::resource('newsletter', 'NewsletterController',['as' => 'admin']);

    });
