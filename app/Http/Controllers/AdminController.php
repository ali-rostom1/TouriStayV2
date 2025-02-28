<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.dashboard");

    }
    public function listings(){
        $listings = Listing::paginate(4);
        return view("admin.listings",compact("listings"));
    }
}
