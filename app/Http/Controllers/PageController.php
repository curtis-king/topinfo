<?php

namespace App\Http\Controllers;

use App\Models\services as ServicesModel;
use App\Models\actuality as ActualityModel;
use App\Models\projects as ProjectsModel;
use App\Models\partenaires as PartenairesModel;
use App\Models\produits as ProduitsModel;

class PageController extends Controller
{
    public function index()
    {
        $services = ServicesModel::all();
        $actualities = ActualityModel::latest()->take(3)->get();
        $projects = ProjectsModel::with('service')->get();
        $partenaires = PartenairesModel::all();
        $produits = ProduitsModel::all();

        return view('welcome', compact(
            'services',
            'actualities',
            'projects',
            'partenaires',
            'produits'
        ));
    }
}
