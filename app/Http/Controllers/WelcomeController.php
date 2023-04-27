<?php

namespace App\Http\Controllers;

use App\Models\etudiant;

use App\Models\professeur;
use Illuminate\Http\Request;

use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\User;
use App\Models\Affectation_etud;
use App\Models\affectation_prof;
use App\Models\Module;

class WelcomeController extends Controller
{
    public function stat(){
        $etud=etudiant::count();
        $prof=professeur::count();
        $mod=module::count();
        return view('welcome',compact(['etud','prof','mod']));
    }
    //
}
