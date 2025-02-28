<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesPermissionController;
use App\Models\Admin;
use App\Models\Tourist;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;




Route::get('/', function () {
    return view('home');
})->middleware(['auth','role:tourist|landlord'])
->name('home');




Route::get('/toggleFavorite/{listing}',[FavoriteController::class,'toggleFavorite'])->middleware(['auth','role:tourist'])->name('favorite');

Route::get('/my_listings',[ListingController::class,'myListings'])->middleware(['auth','role:landlord'])
->name('myListings');

Route::middleware(['auth','role:tourist|landlord|admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('listings', ListingController::class);
});
Route::middleware('auth','role:admin')->group(function () {
    Route::get("/dashboard",[AdminController::class,"index"])->name("dashboard");
    Route::get("/admin/listings",[AdminController::class,"listings"])->name("admin.listings");
});


require __DIR__.'/auth.php';