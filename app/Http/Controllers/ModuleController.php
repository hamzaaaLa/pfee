<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use App\Models\Semestre;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function ajouterView(){
        $filieres = Filiere::get();
        $semestres=Semestre::get();
   return view('AjouterModule',['filieres'=>$filieres],['semestres'=>$semestres]);
    }
    //
}
