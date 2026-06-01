<?php

namespace App\Http\Controllers;

use App\Models\Partenaires;
use App\Support\ImageStorage;
use Illuminate\Http\Request;

class partenaireController extends Controller
{
    public function index()
    {
        $partenaires = Partenaires::all();

        return view('partenaires.index', compact('partenaires'));
    }

    public function create()
    {
        return view('partenaires.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = ImageStorage::store($request->file('logo'), 'partenaires');
        }

        Partenaires::create($data);

        return redirect()->route('partenaires.index')->with('success', 'Partenaire créé avec succès');
    }

    public function show(string $id)
    {
        $partenaire = Partenaires::findOrFail($id);

        return view('partenaires.show', compact('partenaire'));
    }

    public function edit(string $id)
    {
        $partenaire = Partenaires::findOrFail($id);

        return view('partenaires.edit', compact('partenaire'));
    }

    public function update(Request $request, string $id)
    {
        $partenaire = Partenaires::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        if ($request->hasFile('logo')) {
            ImageStorage::delete($partenaire->logo);
            $data['logo'] = ImageStorage::store($request->file('logo'), 'partenaires');
        }

        $partenaire->update($data);

        return redirect()->route('partenaires.index')->with('success', 'Partenaire mis à jour avec succès');
    }

    public function destroy(string $id)
    {
        $partenaire = Partenaires::findOrFail($id);
        $partenaire->delete();

        return redirect()->route('partenaires.index')->with('success', 'Partenaire supprimé avec succès');
    }
}
