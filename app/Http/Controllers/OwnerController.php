<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Asset;


class OwnerController extends Controller
{   
    public function __construct(){
            $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
        $people = Asset::where('assigned', 1)
                        ->whereNotNull('owner_id')
                        ->join('person', 'person.id', '=', 'assets.owner_id')
                        ->select('assets.id as assets_id','assets.name', 'person.firstname','person.lastname','person.id')
                        ->get();
        
        return view('owner.index', compact('people'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $people = Person::all();
//         this will search the owner_id is null and return
        $assets = Asset::whereNull('owner_id')->get();

        return view('owner.create', compact('people', 'assets'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'person' => 'required|exists:person,id',
        'asset' => 'required|exists:assets,id',
    ]);
        
        $asset = Asset::findOrFail($validatedData['asset']);
        $asset->assigned = 1;
        $asset->owner_id = $validatedData['person'];
        $asset->save();

        return redirect('/owner');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
//        the id fetch the assets id record
        $owner = Asset::findOrFail($id);
//        Retive whole person table
        $people = Person::all();
        return view('owner.edit', compact('owner', 'people'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
//       Validate the request data
        $validatedData = $request->validate([
            'person_id' => 'required|exists:person,id',
        ]);

        $asset = Asset::findOrFail($id);

        // Update the asset's owner ID with the validated person_id data
        $asset->owner_id = $validatedData['person_id'];
        $asset->save();

        return redirect()->route('owner.index')->with('success', 'Asset ownership updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//         this code will update the asset table with 0 and null values instead of delete the record

        $asset = Asset::findOrFail($id);
        $asset->assigned = 0;
        $asset->owner_id = null;
        $asset->save();
        return redirect()->route('owner.index')->with('success', 'Person & Asset removed from Ownership successfully');
    }
    
}
