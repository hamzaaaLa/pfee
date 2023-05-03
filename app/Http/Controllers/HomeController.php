<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrateur;
use App\Models\Annonce;
use App\Models\etudiant;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Professeur;
use App\Models\posts;
use App\Models\reply;
use App\Models\User;

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
            return redirect()->route('admineHome');
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

        $module = Module::where('id_module',$id_module)->first();
        $module_name = Module::select('libelleModule')
            ->where('id_module', '=', $id_module)
            ->get();
        $filieres = Filiere::get();
        $annonces = Annonce::orderBy('datecreation', 'desc')->get();
        return view('EspaceCours', [
            'annonces' => $annonces, 
            'filieres' => $filieres, 
            'id_module' => $id_module,
            'module_name' => $module_name,
            'module' => $module, // Add the module object to the view data
        ]);
    }
    //Forum
        //post
        public function Forum($id_module){
            
            $module = Module::where('id_module',$id_module)->first();
            $module_name = $module->libelleModule;
                
            $posts = Posts::withCount('reply')
                        ->where('id_module', $id_module)
                        ->orderByDesc('date_created')
                        ->get();
            return view('Forum', ['id_module' => $id_module, 'module_name' => $module_name,'posts' => $posts],);
        }
        //reply
    public function ForumPost($id_module,$id_post){
        $id_post = posts::where('id_post',$id_post)->first();
        $module = Module::where('id_module', $id_module)->first();
        $module_name = Module::select('libelleModule')
        ->where('id_module', '=', $id_module)
        ->get();
        $module_name = $module->libelleModule;
        $posts = Posts::with('user')->find($id_post);
        $post = Posts::with('user')->where('id_post', $id_post->id_post)->first();
        $reply = Reply::with('user')->where('id_post', $id_post->id_post)->get();
        return view('ForumPost', [  'id_module' => $id_module, 'module_name' => $module_name,'id_post' => $id_post,'posts' => $posts,'post' => $post,'reply' => $reply]);
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
        $admin=administrateur::count();
        return view('admineHome',compact(['prof','etud','mod','admin']));
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
    //delete annonce
    public function delete($id_annonce)
    {
        $annonce = Annonce::find($id_annonce);
        $annonce->delete();
        return redirect()->back()->with('success', 'L\'annonce a été supprimée avec succès!');
    }

    public function modifierImageModule(Request $request, $id_module)
    {
        // Get the file from the request
        $file = $request->file('image');
    
        // Check if a file was uploaded
        if ($file) {
            // Generate a unique file name
            $filename = uniqid('Module_') . '.' . $file->getClientOriginalExtension();
    
            // Save the file to the imagesProfile folder
            $file->move('imagesModule', $filename);
    
            // Update the user's imageProfile attribute with the file path
            User::where('id_module', $id_module)->update([
                'imageModule' => $filename,
            ]);
        }
    
        // Redirect back to the page
        return redirect()->back();
    }
}

