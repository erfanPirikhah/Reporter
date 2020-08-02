<?php

use Illuminate\Support\Facades\Route;
///----------------Routes Dashbord Admin ---------------------------
Route::namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/',function(){return view('Admin.index');});
    Route::resource('supplier' ,'supplierController');
    Route::resource('commodity' ,'commodityController');
    Route::resource('typeExpense' ,'typeExpenseController');
    Route::resource('expense' ,'expenseController');
    Route::resource('sale' ,'saleController');
});
///----------------End Routes Dashbord Admin --------------------------



///----------------Routes Auth ---------------------------
Auth::routes();
///----------------Route Laravel Filemanager -------------
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


///----------------Api ---------------------------
Route::get('/api/price','Admin\Api\apiController@getPrice');