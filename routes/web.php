<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('Admin/supplier/create');
});

Route::namespace('Admin')->group(function () {
    Route::resource('supplier' ,'supplierController');
    Route::resource('commodity' ,'commodityController');

});
