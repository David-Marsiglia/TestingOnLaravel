<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', [CategoryController::class, 'index'])->name('categories.index');

Route::group(['prefix' => 'categories', 'controller' => CategoryController::class], function () {
	Route::get('/', 'index')->name('categories.index');
	Route::get('/get-all', 'index')->name('categories.get-all');
	Route::get('/get-all-dt', 'getAll')->name('categories.get-all-dt');
	Route::get('/{category}', 'show')->name('categories.show');
	Route::post('/', 'store')->name('categories.store');
	Route::put('/{category}', 'update')->name('categories.update');
	Route::delete('/{category}', 'destroy')->name('categories.destroy');
});
