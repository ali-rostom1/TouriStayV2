<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Models\Image;
use App\Models\Listing;
use App\Models\Tourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validatedData = $request->validate([
            'location' => 'nullable|string',
            'check-in' => 'nullable|date',
            'check-out' => 'nullable|date|after_or_equal:check-in',
            'price' => 'nullable|numeric|min:0',
            'type' => 'nullable|in:Appartement,Maison,Villa,Room',
            'sort-by' => 'nullable|in:asc,desc',
            'pag' => 'nullable|in:4,10,15',
        ]);
        $query = Listing::query();

        if ($request->has('location') && $request->location != '') {
            $query->where(function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->location . '%')
                ->orWhere('country', 'like', '%' . $request->location . '%');
            });
        }

        if ($request->has('check-in') && $request->has('check-out') && $request->{'check-in'} != "" && $request->{'check-out'} != "") {
            $query->where(function ($q) use ($request) {
                $q->where('startdate', '<=', $request->{'check-in'})
                ->where('enddate', '>=', $request->{'check-out'});
            });
        }

        if ($request->has('price') && $request->price != '') {
            $query->where('price', '<=', $request->price);
        }

        if ($request->has('type') && $request->{'type'} != '') {
            $query->where('type', $request->{'type'});
        }

        if ($request->has('sort-by') && $request->{'sort-by'} != '') {
            $query->orderBy('price', $request->{'sort-by'});
        } else {
            $query->orderBy('created_at', 'desc'); 
        }

        $perPage = $request->has('pag') ? $request->pag : 4; 
        $listings = $query->with('images')->paginate($perPage);
        $total = $listings->total();
        $tourist = Tourist::with("favoriteListings")->find(Auth::user()->id);

        return view('listings',compact('listings','total','tourist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("lisCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        
        
        $listing = Listing::create($request->validated());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('listing-images', 'public');
                $listing->images()->create(['path' => $path]);
            }
        }
        $listing->save();

        return redirect()->route('listings')->with('success', 'Listing created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listing = Listing::find($id);
        return view("showListing",compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::find($id);
        return view("editListing",compact("listing"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreListingRequest $request, string $id)
    {
        $listing = Listing::find($id);
    
        if (!$listing) {
            return redirect()->route('listings.index')->with('error', 'Listing not found.');
        }
    
        $listing->update($request->validated());
    
        if ($request->deleted_images) {
            $deletedImages = json_decode($request->deleted_images);
            foreach ($deletedImages as $imageId) {
                $image = Image::find($imageId);
                if ($image) {
                    Storage::delete('public/' . $image->path);
                    $image->delete();
                }
            }
        }

        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $path = $file->store('listing-images', 'public');
                $listing->images()->create(['path' => $path]);
            }
        }
    
    
        return redirect()->route('myListings')->with('success', 'Listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
    public function myListings()
    {
        $listings = Listing::where("landlord_id",Auth::user()->id)->paginate(4);
        return view('myListings',compact('listings'));
    }
}
