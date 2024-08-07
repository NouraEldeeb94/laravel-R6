<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ClassController;
use  App\Http\Controllers\ExampleController;
use  App\Http\Controllers\ProductsController;






Route::get('/', function () {
    return view('welcome');
});

// Route::get('add_car', [CarController::class, 'index'])->name('add_car');

// Route::get('cars', function () {
//     return view('cars');
// })->name('cars');

// Route::post('cars', function () {
//     return view('cars');
// })->name('cars');

// Route::get('portfolio', function () {
//     return view('portfolio');
// })->name('portfolio');

// Route::get('login', function () {
//     return view('login');
// })->name('login');
//  Route::prefix('classes')->group(function(){
Route::get('class_create', [ClassController::class, 'create'])->name('class_create');
Route::post('class_store', [ClassController::class, 'store'])->name('class_store');
Route::get('classes', [ClassController::class, 'index'])->name('class_index');
Route::get('class_edit/{id}', [ClassController::class, 'edit'])->name('class_edit');
Route::put('class_update/{id}', [ClassController::class, 'update'])->name('class_update');
Route::get('class_details/{id}', [ClassController::class, 'show'])->name('class_show');

// Route::get('class_delete/{id}', [ClassController::class, 'destroy'])->name('class_destroy');

Route::delete('class_delete/{id}', [ClassController::class, 'destroy'])->name('class_destroy');
Route::get('class_trashed', [ClassController::class, 'showDeleted'])->name('class_showDeleted');
Route::patch('class_restore/{id}', [ClassController::class, 'restore'])->name('class_restored');

Route::delete('classes_dd/{id}', [ClassController::class, 'forcedelete'])->name('class_forcedelete');

//  
Route::get('upload_image', [ExampleController::class, 'uploadform']);
Route::post('upload', [ExampleController::class, 'upload'])->name('upload_image');

Route::get('fashion-index', [ExampleController::class, 'index']);

// products

Route::get('create_product', [ProductsController::class, 'create'])->name('create_product');
Route::post('product_store', [ProductsController::class, 'store'])->name('product_store');
Route::get('fashion_index', [ProductsController::class, 'index'])->name('fashion_index');




