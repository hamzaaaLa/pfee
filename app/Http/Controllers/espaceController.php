<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Annonce;
use App\Models\Cours;
use App\Models\section;
use App\Models\affectation_section;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Professeur;

class espaceController extends Controller
{
    public function store(Request $request, $id_module)
    {       
        $professeur = auth()->user();

        $id_prof = professeur::where('user_prof', $professeur->id_user)->value('id_prof');
        $section = new Section();
        $section->titre_section = $request->input('nomSection');
        $section->id_prof = $id_prof;
        $section->save();
        //affectation section 
        $affectation = new affectation_section();
        $affectation->id_module = $id_module;
        $affectation->id_section = $section->id_section;
        $affectation->save();
        return response('success');
    }
}
