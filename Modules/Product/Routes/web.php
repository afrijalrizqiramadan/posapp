<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth'], function () {
    //Print Barcode
    Route::get('/products/print-barcode', 'BarcodeController@printBarcode')->name('barcode.print');
    Route::get('/products/{product}/copy', 'ProductController@copy')->name('products.copy');
    // Route::post('/products/duplicate', 'ProductController@coduplicatepy')->name('products.duplicate');

    //Product
    Route::resource('products', 'ProductController');
    //Product Category
    Route::resource('product-categories', 'CategoriesController');
});
