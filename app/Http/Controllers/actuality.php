<?php

namespace App\Http\Controllers;

use App\Models\actuality as ActualityModel;
use App\Models\ImagesActuality;
use App\Support\ImageStorage;
use Illuminate\Http\Request;

class actuality extends Controller
{
    public function index()
    {
        $actualites = ActualityModel::latest('publication_date')->get();

        return view('actuality.index', compact('actualites'));
    }

    public function create()
    {
        return view('actuality.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publication_date' => 'required|date',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        if ($request->hasFile('image_path')) {
            $data['image_path'] = ImageStorage::store($request->file('image_path'), 'actualities');
        }

        ActualityModel::create($data);

        return redirect()->route('actuality.index')->with('success', 'Actualité créée avec succès');
    }

    public function show(string $id)
    {
        $actuality = ActualityModel::with('images')->findOrFail($id);

        return view('actuality.show', compact('actuality'));
    }

    public function edit(string $id)
    {
        $actuality = ActualityModel::findOrFail($id);

        return view('actuality.edit', compact('actuality'));
    }

    public function update(Request $request, string $id)
    {
        $actuality = ActualityModel::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publication_date' => 'required|date',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        if ($request->hasFile('image_path')) {
            ImageStorage::delete($actuality->image_path);
            $data['image_path'] = ImageStorage::store($request->file('image_path'), 'actualities');
        }

        $actuality->update($data);

        return redirect()->route('actuality.index')->with('success', 'Actualité mise à jour avec succès');
    }

    public function images_actuality($id)
    {
        $actuality = ActualityModel::findOrFail($id);
        $images = ImagesActuality::where('actuality_id', $id)->get();

        return view('actuality.images', compact('actuality', 'images'));
    }

    public function destroy(string $id)
    {
        $actuality = ActualityModel::findOrFail($id);
        $actuality->delete();

        return redirect()->route('actuality.index')->with('success', 'Actualité supprimée avec succès');
    }
}
