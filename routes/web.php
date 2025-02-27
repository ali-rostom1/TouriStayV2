<?php

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


Route::get('/listings',function(){
    return view('listings');
})->middleware(['auth','role:tourist|landlord'])
->name('listings');

Route::get('/favorites',function(){
    return view('favorites');
})->middleware(['auth','role:tourist'])
->name('favorites');

Route::get('/my_listings',function(){
    return view('myListings');
})->middleware(['auth','role:landlord'])
->name('myListings');
Route::get('/listings/publish',function(){
    return view('publish');
})->middleware(['auth','role:landlord'])
->name('myListings');

Route::middleware(['auth','role:tourist|landlord'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';