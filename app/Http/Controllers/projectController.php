<?php

namespace App\Http\Controllers;

use App\Models\projects;
use App\Models\services;
use App\Support\ImageStorage;
use Illuminate\Http\Request;

class projectController extends Controller
{
    public function index()
    {
        $projects = projects::with('service')->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $services = services::all();

        return view('projects.create', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = ImageStorage::store($request->file('image'), 'projects');
        }

        projects::create($data);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès');
    }

    public function show(string $id)
    {
        $project = projects::with('service', 'images')->findOrFail($id);

        return view('projects.show', compact('project'));
    }

    public function edit(string $id)
    {
        $project = projects::findOrFail($id);
        $services = services::all();

        return view('projects.edit', compact('project', 'services'));
    }

    public function update(Request $request, string $id)
    {
        $project = projects::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            ImageStorage::delete($project->image);
            $data['image'] = ImageStorage::store($request->file('image'), 'projects');
        }

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès');
    }

    public function destroy(string $id)
    {
        $project = projects::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès');
    }
}
