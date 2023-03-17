<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{
    
    public function __construct(){
        
    $this->middleware(['auth', 'verified'])->except(['index', 'show']);

    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asset = Asset::all();
        return view('asset.index', compact('asset'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asset = Asset::find($id);
        return view('asset.show', array('asset' => $asset));
    }
     
    
   
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'value' => 'numeric',
            'purchased' => 'date',
            
        ]);
        $item = Asset::create($validated);
        
        return redirect('/asset')->with('success', 'Item is saved to inventory');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Asset::findOrFail($id);
        return view('asset.edit', compact('item'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'value' => 'numeric',
            'purchased' => 'date',
        ]);
        Asset::whereId($id)->update($validated);
        
        return redirect('/asset')->with('success', 'Item updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Asset::findOrFail($id);
        $item->delete();
        
        return redirect('/asset')->with('success', 'It was deleted from inventory');
    }
        
}
