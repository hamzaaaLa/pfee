<?php

namespace App\Http\Controllers;
use App\Models\Module;
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
    public function getModules(Request $request)
    {
        $selectedFiliere = $request->input('selectedFiliere');
        $selectedSemestres = $request->input('selectedSemestres');

        $modules = Module::select('libelleModule')
                    ->join('filiere', 'module.id_filiere', '=', 'filiere.id_filiere')
                    ->where('filiere.libellefiliere', $selectedFiliere)
                    ->whereIn('module.semestre', $selectedSemestres)
                    ->get();

        return response()->json($modules);
    }
    //
}
