<?php

use Illuminate\Support\Facades\Route;





Route::get('/',function(){return view('Admin.index');});

Route::namespace('Admin')->group(function () {
    Route::resource('supplier' ,'supplierController');
    Route::resource('commodity' ,'commodityController');



});





Auth::routes();

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});