<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Livewire\Frontend\AboutUs;
use App\Http\Livewire\Frontend\Cart;
use App\Http\Livewire\Frontend\Contact;
use App\Http\Livewire\Frontend\Shop;
use App\Http\Livewire\Frontend\SingleProduct;

Route::get('/', [ApplicationController::class, 'index'])->name('home');

Route::get('shop', Shop::class)->name('shop');
Route::get('blog', AboutUs::class)->name('blog');
Route::get('about', AboutUs::class)->name('about');
Route::get('contact', Contact::class)->name('contact');
Route::get('shop/{slug}', SingleProduct::class);
Route::get('product-details', SingleProduct::class)->name('product-details');
Route::get('cart', Cart::class)->name('cart');