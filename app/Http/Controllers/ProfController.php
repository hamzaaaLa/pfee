<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfController extends Controller
{
    public function index()
    {
        $professeur =\App\Models\professeur::all();
        return view('professeur.VisualiserProf', ['professeur' => $professeur]); 
    }

    public function ajoutView(){
        return view('AjouterProfesseur');
    }
    //
}
