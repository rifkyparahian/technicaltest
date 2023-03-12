<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use GuzzleHttp\Middleware;




//Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticated']);
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');


//Dashboard
Route::get('/dashboard', [App\Http\Controllers\ProductController::class, 'count'])->name('dashboard.count');


Route::resource('/products', ProductController::class)->middleware('auth');

Route::get('/', [ProductController::class, 'catalogue']);
Route::get('/detail', [ProductController::class, 'detail']);
Route::post('/products/add', [ProductController::class, 'addProduct'])->name('products.addProduct');
Route::post('/products/delete', [ProductController::class, 'delete'])->name('products.delete');
Route::post('/products/update', [ProductController::class, 'update'])->name('products.update')->middleware('auth');
Route::get('/products/detail/{id}', [ProductController::class, 'detail'])->name('products.detail')->middleware('auth');




Route::resource('/categories', CategoryController::class)->middleware('auth');
// create route to get data from model and send as json for select2
Route::get('/categories/get', [CategoryController::class, 'getCategory'])->name('categories.getCategory')->middleware('auth');
Route::post('/categories/add', [CategoryController::class, 'addCategory'])->name('categories.addCategory')->middleware('auth');
Route::post('/categories/edit', [CategoryController::class, 'updateCategory'])->name('categories.updateCategory')->middleware('auth');
Route::post('/categories/delete', [CategoryController::class, 'delete'])->name('categories.delete')->middleware('auth');
