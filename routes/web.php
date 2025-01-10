<?php
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// Resource routes for standard CRUD operations
Route::resource('products', ProductController::class);
// Custom route for toggling the published status
Route::patch('products/{product}/publish', [ProductController::class, 'publish'])->name('products.publish');

require __DIR__.'/auth.php';



