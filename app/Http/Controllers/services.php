<?php

namespace App\Http\Controllers;

use App\Models\services as ServicesModel;
use Illuminate\Http\Request;

class services extends Controller
{
    public function index()
    {
        $services = ServicesModel::all();

        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
        ]);

        ServicesModel::create($data);

        return redirect()->route('services.index')->with('success', 'Service créé avec succès');
    }

    public function show(string $id)
    {
        $service = ServicesModel::with('projects')->findOrFail($id);

        return view('services.show', compact('service'));
    }

    public function edit(string $id)
    {
        $service = ServicesModel::findOrFail($id);

        return view('services.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $service = ServicesModel::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
        ]);

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès');
    }

    public function destroy(string $id)
    {
        $service = ServicesModel::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès');
    }
}
