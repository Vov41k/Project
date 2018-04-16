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

// Route::get ( '/', function () {
//     return view ( 'welcome' );
// } );

Route::get('/', 'WelcomeController@welcome')->name('home');

Route::get('/showcategory/{id}', 'CategoryController@index')->name('category.show');
Route::post('/showcategory/{id}/filter', 'FilterController@filter')->name('category.filter');

Route::post('/search', 'SearchController@search')->name('search');
Route::get('/showselected/{id}', 'ProductController@index')->name('showselectedproduct');
Route::get('/cart', 'CartController@index')->name('cart');

Route::post('/cart/{id}/reduce', 'CartController@reduceQuantity')->name('qty.reduce');
Route::post('/cart/{id}/add', 'CartController@addQuantity')->name('qty.add');

Route::post('/order', 'OrderController@createOrder')->name('order');

Route::post('/subscribe', 'SubscribersController@index')->name('subscribers');
Route::post('/create/comment/{id}', 'CommentsController@create')->name('createcomment');

Route::get('/addtocart/{id}', 'CartController@addToCart')->name('addtocart');
// Route::post('/addtocart/{id}', 'CartController@addToCart')->name('addtocart');
Route::get('/deletefromcart/{id}', 'CartController@remove')->name('remove');
Route::get('/emptycart', 'CartController@deletecart')->name('emptycart');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{id}', 'NewsController@show')->name('showNews');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@send')->name('sendMessage');
Route::get('/register/confirm/{token}','ConfirmationController@confirm');
Route::get('/password/reset/{token}','ResetPasswordController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group([
    'middleware' => ['web', 'auth', 'role:admin'],
    'prefix'     => 'admin',
    'as'         => 'admin.',
], function () {

    Route::resource('product', 'Admin\ProductController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('media', 'Admin\MediaController');
    Route::resource('news', 'Admin\NewsController');
    Route::resource('comments', 'Admin\CommentsController');
    
    Route::get('subscribers','Admin\SubscribersController@index')->name('showsubscribers');
    Route::delete('subscribers/{id}','Admin\SubscribersController@delete')->name('deletesubscriber');

    // Route::post('comments/{id}/answer/{user}/{productid}', ['uses' => 'Admin\CommentsController@answer', 'as' => 'comments.answer']);
    // Route::post('comments/{id}/answer/{user}/{productid}/save', ['uses' => 'Admin\CommentsController@saveanswer', 'as' => 'comments.saveanswer']);
    Route::post('comments/{id}/activate', ['uses' => 'Admin\CommentsController@activate', 'as' => 'comments.activate']);
    Route::post('product/{id}/activate', ['uses' => 'Admin\ProductController@activate', 'as' => 'product.activate']);

    Route::post('product/{id}/image/slider/add', 'Admin\ImagesSliderController@add')->name('imageadd');
    Route::get('product/{id}/image/slider/change', 'Admin\ImagesSliderController@changeimageslider')->name('changesliderimage');
    Route::delete('product/{id}/slider/image/{idim}/delete', 'Admin\ImagesSliderController@deleteimageslider')->name('deleteimageslider');
    Route::patch('product/{id}/slider/image/{idim}/change', 'Admin\ImagesSliderController@changeoneimage')->name('changeonephotoimageslider');

    Route::get('product/{id}/option', 'Admin\OptionsController@index')->name('productsoption');
    Route::post('product/{id}/option', 'Admin\OptionsController@save')->name('productsoptionsave');
    Route::delete('product/{id}/option/{optionid}', 'Admin\OptionsController@delete')->name('productsoptiondelete');
    Route::get('product/{id}/option/{optionid}', 'Admin\OptionsController@edit')->name('productsoptionedit');
    Route::patch('product/{id}/option/{optionid}', 'Admin\OptionsController@update')->name('productsoptionupdate');

    Route::resource('product', 'Admin\ProductController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('media', 'Admin\MediaController');
    Route::resource('news', 'Admin\NewsController');
    Route::post('news/{id}/email/{userName}/', ['uses' => 'Admin\MailController@send', 'as' => 'news.email.send']);

    Route::get('/orders', [
        'uses' => 'Admin\OrdersController@index',
        'as'   => 'orders',
    ]);
        Route::delete('/orders/{id}/delete', [
        'uses' => 'Admin\OrdersController@delete',
        'as'   => 'orders.delete',
    ]);
            Route::get('/orders/{id}/edit', [
        'uses' => 'Admin\OrdersController@edit',
        'as'   => 'orders.edit',
    ]);
      Route::patch('order/{id}/option/update', [
          'uses'=>'Admin\OrdersController@update',
          'as'=>'orders.update',
      ]);

});
