<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use App\Models\Semestre;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function dropDownShow(Request $request){
   $filieres = Filiere::get();
   $semestres=Semestre::get();
   return view('adminAjoutEtud',['filieres'=>$filieres],['semestres'=>$semestres]);
}
    //
}
