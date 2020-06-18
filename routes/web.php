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

Route::get('/', 'PagesController@root')->name('root');

Auth::routes(['verify' => true]);



Route::resource('orders', 'OrdersController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::get('create_detail/{orders}','OrdersController@createDetail')->name('orders.create_detail');

Route::get('order_detail/{date_begin?}{date_end?}{order_type?}','OrdersController@showDetail')->name('orders.order_detail');

Route::get('exportdetail','OrdersController@export')->name('orders.export');

Route::get('orders/{order}/check', 'OrdersController@check')->name('orders.check');
// 待定
Route::resource('orderdetails', 'OrderdetailsController', ['only' => ['index', 'show', 'create', 'store', 'destroy']]);

Route::post('upload_image', 'OrdersController@uploadImage')->name('orders.upload_image');

Route::resource('collecteds', 'CollectedsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('receivables', 'ReceivablesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
//
Route::resource('stocks', 'StocksController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('instocks', 'InstocksController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::get('instock_detail/{instocks}','InstocksController@createDetail')->name('instocks.create_detail');

Route::get('instock_detail/{date_begin?}{date_end?}{generating_unit_no?}','InstocksController@showDetail')->name('instocks.instock_detail');

Route::get('exportinstockdetail','InstocksController@export')->name('exports.instockdetails');

Route::resource('instockdetails', 'InstockdetailsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('outstocks', 'OutstocksController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);