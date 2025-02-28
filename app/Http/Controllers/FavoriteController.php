<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Tourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggleFavorite(Listing $listing)
    {
        $tourist = Tourist::find(Auth::user()->id);
        if($tourist->favoriteListings()->where('listing_id',$listing->id)->exists()){
            $tourist->favoriteListings()->detach($listing->id);
            $message = 'successfully unfavorited !';
        }else{
            $tourist->favoriteListings()->attach($listing->id);
            $message = 'successfully favorited !';
        }
        return redirect()->back()->with('success',$message);
    }
}
