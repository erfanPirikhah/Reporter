<?php

use Illuminate\Support\Facades\Route;
///----------------Routes Dashbord Admin ---------------------------
Route::namespace('Admin')->middleware('auth')->group(function () {

    Route::resource('supplier' ,'supplierController');
    Route::resource('commodity' ,'commodityController');
    Route::resource('typeExpense' ,'typeExpenseController');
    Route::resource('expense' ,'expenseController');
    Route::resource('sale' ,'saleController');



    Route::get('/','reportController@index')->name('index');
    Route::get('/reportmonth','reportController@reportMonth')->name('month');
    Route::get('/reportweek','reportController@reportWeek')->name('week');
    Route::get('/reportday','reportController@reportDay')->name('day');
});
///----------------End Routes Dashbord Admin --------------------------



///----------------Routes Auth ---------------------------
Auth::routes();
///----------------Route Laravel Filemanager -------------
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


///----------------Api ---------------------------
Route::post('/api/supplier','Admin\reportController@apiSupplier');
Route::post('/api/commodity','Admin\reportController@apiCommodity');


///----------------Search ---------------------------
Route::get('search/sale' , 'Admin\saleController@search')->name('sale.search');
Route::get('search/supplier' , 'Admin\supplierController@search')->name('supplier.search');
Route::get('search/commodity' , 'Admin\commodityController@search')->name('commodity.search');
Route::get('search/expense' , 'Admin\expenseController@search')->name('expense.search');