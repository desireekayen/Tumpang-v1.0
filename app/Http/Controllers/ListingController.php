<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    //show all listings
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter
            (request(['tag', 'search']))->paginate(6)
        ]);
    }

    //Show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);//using eloquent model (route model binding)
    }

    //Show Create Form
    public function createOffer() {
        return view('listings.createOffer');
    }

    //Store Listing Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'ride' => 'required',
            'pickup' => 'required',
            'dropoff' => 'required',
            'datetime' => 'required',
            'passengers' => 'required|integer|min:1|max:4',
            'tags' => 'regex:/[A-Za-z]+,\\s+[A-Za-z]+,\\s+[A-Za-z]+/i',
            'description' => 'required'
            
        ]);
        
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing Created Successfully!');
    }

    //Show Edit Form
    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    //Update Listing Data
    public function update(Request $request, Listing $listing) {
        
        //Make sure logged in user is the owner of the listing
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'ride' => 'required',
            'pickup' => 'required',
            'dropoff' => 'required',
            'datetime' => 'required',
            'passengers' => 'required|integer|min:1|max:4',
            'tags' => 'regex:/^[A-Za-z]+(,\s*[A-Za-z]+)*$/i',
            'description' => 'required'
        ]);  
        
        $formFields['user_id'] = auth()->id();

        $listing->update($formFields);

        return back()->with('message', 'Listing Updated Successfully!');
    }

    //Delete Listing
    public function destroy(Listing $listing) {

        //Make sure logged in user is the owner of the listing
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully!');
    }

    //Manage Listings
    public function manage() {
        $user = auth()->user();
        return view('listings.manage', [
            'listings' => request()->user()->listings()->get()
        ]);
    }
}
