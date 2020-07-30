<?php

use Illuminate\Support\Facades\Route;







Route::namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/',function(){return view('Admin.index');});
    Route::resource('supplier' ,'supplierController');
    Route::resource('commodity' ,'commodityController');



});





Auth::routes();

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});