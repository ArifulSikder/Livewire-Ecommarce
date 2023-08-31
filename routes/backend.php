<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Backend\Category;
use App\Http\Livewire\Backend\Product\AddProduct;
use App\Http\Livewire\Backend\Product\Banner;
use App\Http\Livewire\Backend\Product\Details;
use App\Http\Livewire\Backend\Product\EditProduct;
use App\Http\Livewire\Backend\Product\Products;
use App\Http\Livewire\Backend\Setting\Varients;
use App\Http\Livewire\Backend\User\UserList;

Route::get('/dashboard', DashboardController::class)->name('dashboard');
Route::get('/category', Category::class)->name('category');
Route::get('/banner', Banner::class)->name('banner');
Route::get('/add-product', AddProduct::class)->name('add-product');
Route::get('/edit-product/{product_id}', EditProduct::class)->name('edit-product', 'product_id');
Route::get('/products', Products::class)->name('products');
Route::get('/detail/{product}', Details::class)->name('detail');
Route::get('/variants', Varients::class)->name('variants');

Route::get('users', UserList::class)->name('users');
