<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;


class PersonController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $person = Person::all();
        return view('person.index', compact('person'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate(
                ['firstname' =>'required|max:100',
                 'lastname' => 'required|max:100',
                 'dateofbirth' => 'date',
                 'emailaddress' => 'required|email']);
    
        $item = person::create($validated);
        
        return redirect('/person')->with('success', 'Item is saved to Person');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $person = Person::find($id);
        return view('/person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Person::findOrFail($id);
            return view('person.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request -> validate(
                ['firstname' =>'required|max:100',
                 'lastname' => 'required|max:100',
                 'dateofbirth' => 'date',
                 'emailaddress' => 'required|email']);
    
        Person::whereId($id)->update($validated);
        
        return redirect('/person')->with('success', 'Item is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Person::findOrFail($id);
        $item->delete();
        
        return redirect('/person')->with('success', 'It was deleted from person');
    }
}
