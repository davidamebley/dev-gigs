<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Display ALL listing
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(
                request(['tag', 'search'])
            )->paginate(6)
        ]);
    }

    /**
     * Display a SINGLE listing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show Create a Listing Form
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        // Add Logo Image File
        if ($request->hasFile('logo')) {
            // store logo inside the logos subfolder of the storage/app/public folder
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Create New Listing with UserID through current User
        $request->user()->listings()->create($formFields); //Laravel uses this relationship setup to automatically fill in the user_id 

        // The next two lines are an alternative to the line above
        /* $formFields['user_id'] = auth()->id();
        Listing::create($formFields); */

        return redirect('/')->with('message', 'Listing created successfully.');
    }


    // Show Edit Listing Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        // Add Logo Image File
        if ($request->hasFile('logo')) {
            // store logo inside the logos subfolder of the storage/app/public folder
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        // dd($listing->id);

        return redirect('/listings/' . $listing->id)->with('message', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully.');
    }

    // Manage Listing
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings->get()]);  //Pass the current user's listings to view
    }
}
