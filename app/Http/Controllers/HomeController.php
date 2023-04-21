<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\etudiant;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Professeur;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (auth()->user()->type =='admin') {
            return redirect()->route('admin.dashboard');
        }
        else if (auth()->user()->type =='prof') {
            return redirect()->route('prof.dashboard');
        }
        else if (auth()->user()->type =='user'){
            return redirect()->route('dashboard');
        } 
    }
    public function etudDashboard()
    {
        $modules = Module::get();
        $filieres = Filiere::get();
        $annonces = Annonce::orderBy('datecreation', 'desc')->get();
        return view('etudHome', ['annonces' => $annonces, 'filieres' => $filieres, 'modules' => $modules],);
    }
    public function EspaceCours($id_module){
        
        $id_module = Module::where('id_module',$id_module)->first();
        $module_name = Module::select('libelleModule')
        ->where('id_module', '=', $id_module)
        ->get();
        $filieres = Filiere::get();
        $annonces = Annonce::orderBy('datecreation', 'desc')->get();
        return view('EspaceCours', ['annonces' => $annonces, 'filieres' => $filieres, 'id_module' => $id_module,'module_name' => $module_name],);
    }
    
    public function profDashboard()
    {   
        return view('etudHome');
    }

    public function adminDashboard()
    {   
        $prof=Professeur::count();
        $etud=etudiant::count();
        $mod=Module::count();
        return view('admineHome',compact(['prof','etud','mod']));
    }
    //displaying modules commande
    public function getModules(Request $request) {

        $professeur = auth()->user();

        $selectedFiliere = $request->input('selectedFiliere');

        $modules = Module::select('module.libelleModule')
                ->join('affectation_prof', 'module.id_module', '=', 'affectation_prof.id_module')
                ->join('professeur', 'affectation_prof.id_prof', '=', 'professeur.id_prof')
                ->join('filiere', 'module.id_filiere', '=', 'filiere.id_filiere')
                ->where('professeur.user_prof', '=', $professeur->id_user)
                ->where('filiere.libellefiliere', '=', $selectedFiliere)
                ->get();

        return response()->json($modules);
    }
    //annonce store
    public function store(Request $request)
    {
        
        $professeur = auth()->user();
        $id_prof = professeur::where('user_prof', $professeur->id_user)->value('id_prof');

        $module = $request->input('moduleSelect');
        
        $annonce= new Annonce;
        $annonce->id_prof=$id_prof;
        $annonce->id_module = module::where('libelleModule', $module)->value('id_module');
        $annonce->titre = $request->input('titre');
        $annonce->contenue = $request->input('contenue');
    
        if ($annonce->id_module) {
            $annonce->save();
            return redirect()->back()->with('success', 'Annonce créée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Module invalide.');
        }
        return redirect()->back()->with('success', 'Annonce créée avec succès.');
    }
}

