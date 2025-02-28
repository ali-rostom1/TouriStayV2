<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $totalUsers = User::count();
        $listings = Listing::count();
        $activeListings = Listing::has('favoriteTourists', '>=', 1)->count();
        return view("admin.dashboard",compact('totalUsers','listings','activeListings'));

    }
    public function listings(){
        $listings = Listing::paginate(4);
        return view("admin.listings",compact("listings"));
    }
}
