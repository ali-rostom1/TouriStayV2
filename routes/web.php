<?php

use App\Http\Controllers\AdminController;
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


Route::get('/listings',[ListingController::class,"index"])->middleware(['auth','role:tourist|landlord'])
->name('listings');
Route::get('/listings/publish',[ListingController::class,"create"])->middleware(['auth','role:landlord'])->name('listings.create');
Route::post('/listings/store',[ListingController::class,"store"])->middleware(['auth','role:landlord'])->name('listings.store');
Route::get('/listings/edit/{listing}',[ListingController::class,"edit"])->middleware(['auth','role:landlord'])->name('listings.edit');
Route::get('/listings/show/{listing}',[ListingController::class,"show"])->middleware(['auth','role:landlord'])->name('listings.show');
Route::put('/listings/update/{listing}',[ListingController::class,"update"])->middleware(['auth','role:landlord'])->name('listings.update');
Route::delete('/listings/destroy/',[ListingController::class,"delete"])->middleware(['auth','role:landlord'])->name('listings.delete');


Route::get('/favorites',function(){
    return view('favorites');
})->middleware(['auth','role:tourist'])
->name('favorites');

Route::get('/my_listings',[ListingController::class,'myListings'])->middleware(['auth','role:landlord'])
->name('myListings');

Route::middleware(['auth','role:tourist|landlord|admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth",'role:admin'])->group(function(){
    Route::get('/dashboard',[AdminController::class,"index"])->name("dashboard");
});




require __DIR__.'/auth.php';