<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class actuality extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $actualites=Actuality::all()->sortByDesc('publication_date');
        return view('actuality.index',compact('actualites'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('actuality.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'publication_date' => 'required|date',
            'description' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $actuality=Actuality::find($id);
        return view('actuality.show',compact('actuality'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $actuality=Actuality::find($id);
        return view('actuality.edit',compact('actuality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'publication_date' => 'required|date',
            'description' => 'required',
        ]);
        $actuality=Actuality::find($id);
        $actuality->update($request->all());
        return redirect()->route('actuality.index')->with('success','Actualité mise à jour avec succès');
    }

    public function images_actuality($id)
    {
        $actuality = Actuality::find($id);
        $images = ImagesActuality::where('actuality_id', $id)->get();
        return view('actuality.images', compact('actuality', 'images'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $actuality=Actuality::find($id);
        $actuality->delete();
        return redirect()->route('actuality.index')->with('success','Actualité supprimée avec
    }
}
