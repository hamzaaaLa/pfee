<?php

namespace App\Http\Controllers;
use App\Models\professeur;
use App\Models\Module;
use App\Models\Filiere;
use App\Models\Semestre;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $module =\App\Models\module::all();
        return view('visualiserModule', ['module' => $module]);
    }

    public function ajouterView(){
        $filieres = Filiere::get();
        $semestres = Semestre::get();
        $professeur = professeur::get();
    return view('AjouterModule',['filieres'=>$filieres,'semestres'=>$semestres,'professeur'=>$professeur]);
    }
    //
    public function getModules(Request $request)
    {
        $selectedFiliere = $request->input('selectedFiliere');
        $selectedSemestres = $request->input('selectedSemestres');

        $selectedSemestres = implode(",", $selectedSemestres);

        $modules = Module::select('libelleModule')
            ->join('filiere', 'module.id_filiere', '=', 'filiere.id_filiere')
            ->where('filiere.libellefiliere', '=', $selectedFiliere)
            ->whereIn('module.semestre', explode(",", $selectedSemestres))
            ->get();

        return response()->json($modules);
    }
}
