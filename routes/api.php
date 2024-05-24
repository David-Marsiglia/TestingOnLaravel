<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


Route::group(['prefix' => 'categories', 'controller' => CategoryController::class], function () {
	Route::get('/', 'index');
	Route::get('/{category}', 'show');
	Route::post('/', 'store');
	Route::put('/{category}', 'update');
	Route::delete('/{category}', 'destroy');
});

