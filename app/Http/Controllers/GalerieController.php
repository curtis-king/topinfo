<?php

namespace App\Http\Controllers;

use App\Models\Galerie;
use App\Support\ImageStorage;
use Illuminate\Http\Request;

class GalerieController extends Controller
{
    public function index()
    {
        $galeries = Galerie::latest()->get();

        return view('galerie.index', compact('galeries'));
    }

    public function create()
    {
        return view('galerie.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $data['cover_image'] = ImageStorage::store($request->file('cover_image'), 'galerie');

        Galerie::create($data);

        return redirect()->route('galerie.index')->with('success', 'Image ajoutée avec succès');
    }

    public function edit(string $id)
    {
        $galerie = Galerie::findOrFail($id);

        return view('galerie.edit', compact('galerie'));
    }

    public function update(Request $request, string $id)
    {
        $galerie = Galerie::findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        if ($request->hasFile('cover_image')) {
            ImageStorage::delete($galerie->cover_image);
            $data['cover_image'] = ImageStorage::store($request->file('cover_image'), 'galerie');
        } else {
            unset($data['cover_image']);
        }

        $galerie->update($data);

        return redirect()->route('galerie.index')->with('success', 'Image mise à jour avec succès');
    }

    public function destroy(string $id)
    {
        $galerie = Galerie::findOrFail($id);
        ImageStorage::delete($galerie->cover_image);
        $galerie->delete();

        return redirect()->route('galerie.index')->with('success', 'Image supprimée avec succès');
    }
}
