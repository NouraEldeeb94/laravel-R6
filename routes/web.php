<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ClassController;
use App\Http\Controllers\ContactController;
use  App\Http\Controllers\ExampleController;
use  App\Http\Controllers\ProductsController;
use phpDocumentor\Reflection\DocBlock\ExampleFinder;

Route::get('/', function () {
    return view('welcome');
});


 Route::prefix('classes')->group(function(){
Route::get('create', [ClassController::class, 'create'])->name('class_create');
Route::post('store', [ClassController::class, 'store'])->name('class_store');
Route::get('/', [ClassController::class, 'index'])->name('class_index');
Route::get('edit/{id}', [ClassController::class, 'edit'])->name('class_edit');
Route::put('update/{id}', [ClassController::class, 'update'])->name('class_update');
Route::get('details/{id}', [ClassController::class, 'show'])->name('class_show');
Route::delete('delete/{id}', [ClassController::class, 'destroy'])->name('class_destroy');
Route::get('trashed', [ClassController::class, 'showDeleted'])->name('class_showDeleted');
Route::patch('restore/{id}', [ClassController::class, 'restore'])->name('class_restored');
Route::delete('dd/{id}', [ClassController::class, 'forcedelete'])->name('class_forcedelete');
Route::get('class_delete/{id}', [ClassController::class, 'destroy'])->name('class_destroy');

 });





// routes of products

Route::prefix('product')->middleware('verified')->group(function(){
Route::get('create', [ProductsController::class, 'create'])->name('create_product');
Route::post('store', [ProductsController::class, 'store'])->name('product_store');
Route::get('index', [ProductsController::class, 'index'])->name('product_index');
Route::get('edit/{id}', [ProductsController::class, 'edit'])->name('product_edit');
Route::put('update/{id}', [ProductsController::class, 'update'])->name('product_update');

});




// routes of cars 

Route::prefix('cars')->middleware('verified')->group(function(){

Route::get('create', [CarController::class, 'create'])->name('car_create');
Route::get('index', [CarController::class, 'index'])->name('car_index');
Route::post('store', [CarController::class, 'store'])->name('car_store');
Route::get('edit/{id}', [CarController::class, 'edit'])->name('car_edit');
Route::put('update/{id}', [CarController::class, 'update'])->name('car_update');
Route::get('details/{id}', [CarController::class, 'show'])->name('car_show');

});

// one to many relationship

Route::get('car_test', [ExampleController::class, 'car'])->middleware('verified');
Route::get('cat', [ExampleController::class, 'cat']);
Route::get('test', [ExampleController::class, 'test']);
Route::get('allproducts', [ExampleController::class, 'index']);
Route::get('about', [ExampleController::class, 'about']);
Route::get('products', [ExampleController::class, 'product']);
Route::get('fashion-index', [ExampleController::class, 'index']);

// images upload

Route::get('upload_image', [ExampleController::class, 'uploadform']);
Route::post('upload', [ExampleController::class, 'upload'])->name('upload_image');



Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// send message
Route::get('contact_us', [ExampleController::class, 'contact']);
Route::post('send_message', [ExampleController::class, 'send'])->name('send_message');