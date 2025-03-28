<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Delivery;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    redirect()->route('login');
});
Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    $deliveries = Delivery::where('farmer_id', Auth::id())->get();
    return view('dashboard' , compact('deliveries'));
})->name('dashboard');

Route::get('admin/dashboard', function () {
    $stocks = Stock::all();
    $products = Product::all();
    $farmers = User::where('role', 'farmer')->get();
    $deliveries = Delivery::all();
    $users = User::all();
    // dd($stocks);
    return view('admin.dashboard', compact('stocks', 'products', 'farmers', 'deliveries','users'));
})->name('admin.dashboard');

Route::get('/register', [UserController::class, 'showForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('admin/stocks', function () {
    $stocks = Stock::all();
    dd($stocks);
    return view('admin.stock', compact('stocks'));
})->name('admin.stocks.index');

Route::resource('deliveries', DeliveryController::class);
Route::resource('products', ProductController::class);
Route::resource('stocks', StockController::class);