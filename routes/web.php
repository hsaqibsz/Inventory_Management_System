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

 route::get('/about', 'HomeController@about')->name('about');
 route::get('/', 'HomeController@welcome')->name('welcome');
 route::get('/contact/order', 'HomeController@order')->name('front.contact');
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pricing', 'HomeController@pricing')->name('front.pricing');

route::resource('/imports','ImportsController');
route::resource('/category','CategoryController');

route::resource('/customer', 'CustomerController');

route::get('/customer-deal/{id}', 'DealController@deal')->name('customer.deal');

route::get('/customer-sale/{id}', 'SalesController@sale')->name('customer.sale');


route::resource('/deal', 'DealController');

route::get('/deal-print/{id}', 'DealController@print')->name('deal.print');
route::get('/sales-print/{id}', 'SalesController@print')->name('sales.print');
route::get('/sales-print-last/{id}', 'SalesController@print_last')->name('sales.print.last');


route::post('/sales-search', 'CustomerController@search')->name('customer.search');
 

route::resource('/sales','SalesController');
route::resource('/contact', 'ContactController');


route::group(['prefix'=>'report'], function(){

route::post('/sales_english', 'ReportController@sales_english')->name('sales_english');
route::get('/sales_pashto', 'ReportController@sales_pashto')->name('sales_pashto');

route::get('/stock_english', 'ReportController@stock_english')->name('stock_english');
route::get('/stock_pashto', 'ReportController@stock_pashto')->name('stock_pashto');

route::get('/customer_english', 'ReportController@customer_english')->name('customer_english');
route::get('/customer_pashto', 'ReportController@customer_pashto')->name('customer_pashto');


route::get('/deal_english', 'ReportController@deal_english')->name('deal_english');
route::get('/deal_pashto', 'ReportController@deal_pashto')->name('deal_pashto');

});



route::get('/review/{id}', 'ReviewController@add_review')->name('add_review')->middleware('auth');
route::get('/review-remove/{id}', 'ReviewController@remove_review')->name('remove_review')->middleware('auth');