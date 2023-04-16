<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\affectation_prof;
use App\Models\professeur;
use App\Models\module;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\User;
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

    public function add(Request $request){
        $module=new module();
        $affectProf=new affectation_prof();

        $module->libelleModule=$request->input('libelle');
        $module->id_filiere=Filiere::where('libellefiliere',($request->input('filiereSelect')))->value('id_filiere');
        $module->semestre=$request->input('semestreSelect');
        $module->save();

        //$affectProf->id_prof=User::join('professeur','users.id_user','=','professeur.user_prof')->select("*", DB::raw("CONCAT(users.name,' ',users.prenom) AS full_name"))->where('full_name',($request->input('professeur')))->value('professeur.id_prof');
        $affectProf->id_prof=User::join('professeur','users.id_user','=','professeur.user_prof')->where((DB::raw("CONCAT(users.name,' ',users.prenom)")),$request->input('professeur'))->value('professeur.id_prof');
        $affectProf->id_module=$module->id_module;
        $affectProf->save();

        return redirect()->back();

    }
}
