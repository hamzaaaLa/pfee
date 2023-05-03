<?php

namespace App\Http\Controllers;

use App\Models\affectation_semestre;
use Illuminate\Http\Request;

use Illuminate\Support\File;
use Illuminate\Support\Facades\DB;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\User;
use App\Models\Affectation_etud;
use App\Models\affectation_prof;
use App\Models\Module;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiant = Etudiant::all();
        return view('visualiserEtudiant', ['etudiant' => $etudiant]);
    }
    public function consulter(){
        $filieres = Filiere::get();
        $semestres=Semestre::get();

        return view('ModifierEtudiant',['filieres'=>$filieres],['semestres'=>$semestres]);
    }

    function add(Request $request){
        $request->validate([
            'name'=>'required',
            'prenom'=>'required',
            'email'=>'required|email|unique:users',

        ]);


        /*$query=DB::table('etudiants')->insert([
            'nom'=>$request->input('name'),
            'prenom'=>$request->input('prenom'),
            'email'=>$request->input('email'),
        ]);*/
        $user=new User;
        $etudiant = new Etudiant;
        $user->type=0;
        $user->name= $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->cin = $request->input('cin');
        $user->telephone=$request->input('tel');
        $user->nomUtilisateur=$request->input('email');
        $user->password = bcrypt($request->input('cin'));
        $user->save();

        $etudiant->cne=$request->input('cne');
        $etudiant->filiere=$request->input('filiereSelect');
        $etudiant->user_etud=$user->id_user;
        $etudiant->save();

        $semestreValues=$request->input('semestreSelect');
        foreach($semestreValues as $key){
            $affectSemestre=new affectation_semestre();
            $affectSemestre->id_etud=$etudiant->id_etud;
            $affectSemestre->id_semestre=Semestre::where('libelleSemestre',$key)->value('id_semestre');
            $affectSemestre->save();
        }

        $moduleValues=$request->input('moduleSelect');


        foreach($moduleValues as $key){
            $affectEtud=new Affectation_etud();
            $affectEtud->id_etud=$etudiant->id_etud;
            $affectEtud->id_module=Module::where('libelleModule',$key)->value('id_module');
            $affectEtud->save();
        }



        return redirect()->back();

        /*if($query){
            return back()->with('success','data successufly inserted');
        }
        else{
            return back()->with('fail','something wrong');
        }*/

    }
    public function retriev(){
        /*get() retrieve all the lines in our Etudiant table and put it in the var $etudiant*/
        $etudiants=Etudiant::orderBy('nom','asc')->get();
        return view('visualiserEtudiant',['etudiants'=>$etudiants]);
        }

    public function edit($id_user){
        $filieres=Filiere::get();
        $semestres=Semestre::get();
        $users=User::where('id_user',$id_user)->first();
        //'users'=>User::where('id_user',$id_user)->first()
        $etudiant=User::join('etudiant','users.id_user','=','etudiant.user_etud')->where('id_user',$id_user)->first();
        /*return view('ModifierEtudiant',['filieres'=>$filieres],[
            'users'=>User::where('id_user',$id_user)->first()
        ],['semestres'=>$semestres]);*/
        return view('ModifierEtudiant',compact(['filieres','semestres','etudiant','users']));
    }

    public function update(Request $request,$id_user){

        $id_etud=User::join('etudiant','users.id_user','=','etudiant.user_etud')->where('users.id_user',$id_user)->value('etudiant.id_etud');
        affectation_semestre::where('id_etud','=',$id_etud)->delete();
        Affectation_etud::where('id_etud','=',$id_etud)->delete();
        User::where('id_user',$id_user)->update([
        'name'=>$request->name,
        'prenom'=>$request->prenom,
        'email'=>$request->email,
        'cin'=>$request->cin,
        'telephone'=>$request->tel,
        'password'=>bcrypt($request->cin),
        'nomUtilisateur'=>$request->email,

        ]);

        Etudiant::where('user_etud',$id_user)->update([
        'filiere'=>$request->input('filiereSelect'),
        ]);

        $semestreValues=$request->input('semestreSelect');
        foreach($semestreValues as $key){
            affectation_semestre::where('id_etud',$id_etud)->updateOrCreate([
            'id_etud'=>$id_etud,
            'id_semestre'=>Semestre::where('libelleSemestre',$key)->value('id_semestre'),
            ]);
        }

        $moduleValues=$request->input('moduleSelect');


        foreach($moduleValues as $key){
            Affectation_etud::where('id_etud',$id_etud)->updateOrCreate([
            'id_etud'=>$id_etud,
            'id_module'=>Module::where('libelleModule',$key)->value('id_module'),
            ]);

        }

        return redirect(route('afficheEtud'));
    }

    public function delete($id_user) {
        $id_etud=User::join('etudiant','users.id_user','=','etudiant.user_etud')->where('users.id_user',$id_user)->value('etudiant.id_etud');
        affectation_semestre::where('id_etud','=',$id_etud)->delete();
        Affectation_etud::where('id_etud','=',$id_etud)->delete();
        Etudiant::where('user_etud','=',$id_user)->delete();
        User::where('id_user','=',$id_user)->delete();

            return redirect(route('afficheEtud'));
        }

    public function getProfile($id_user){
        $id_etud=User::join('etudiant','users.id_user','=','etudiant.user_etud')->where('users.id_user',$id_user)->value('etudiant.id_etud');
        $etudiant=User::join('etudiant','users.id_user','=','etudiant.user_etud')->where('users.id_user',$id_user)->first();
        $semestre=affectation_semestre::join('semestre','affectation_semestre.id_semestre','=','semestre.id_semestre')->where('affectation_semestre.id_etud',$id_etud)->get();
        $module=Affectation_etud::join('module','affectation_etud.id_module','=','module.id_module')->where('affectation_etud.id_etud',$id_etud)->get();
        return view('Profile',compact(['etudiant','semestre','module']));
    }

    public function modifierProfile(Request $request,$id_user){
        User::where('id_user',$id_user)->update([
            'email'=>$request->email,
            'nomUtilisateur'=>$request->email,
            'imageProfile'=>$request->image,
        ]);
        return redirect()->back();
    }
    public function modifierPhoto(Request $request, $id_user)
    {
        // Get the file from the request
        $file = $request->file('image');

        // Check if a file was uploaded
        if ($file) {
            // Generate a unique file name
            $filename = uniqid('profile_') . '.' . $file->getClientOriginalExtension();

            // Save the file to the imagesProfile folder
            $file->move('imagesProfile', $filename);

            // Update the user's imageProfile attribute with the file path
            User::where('id_user', $id_user)->update([
                'imageProfile' => $filename,
            ]);
        }

        // Redirect back to the page
        return redirect()->back();
    }

     public function getProfProfile($id_user){
        $id_prof=User::join('professeur','users.id_user','=','professeur.user_prof')->where('users.id_user',$id_user)->value('professeur.id_prof');
        $prof=User::join('professeur','users.id_user','=','professeur.user_prof')->where('users.id_user',$id_user)->first();
        $module=affectation_prof::join('module','affectation_prof.id_module','=','module.id_module')->where('affectation_prof.id_prof',$id_prof)->get();
        return view('ProfileOther',compact(['prof','module']));
     }
     public function tousLesModules($id_user){
        $id_etud=User::join('etudiant','users.id_user','=','etudiant.user_etud')->where('users.id_user',$id_user)->value('etudiant.id_etud');
        $id_filiere=Etudiant::join('filiere','etudiant.filiere','=','filiere.libelleFiliere')->where('etudiant.id_etud',$id_etud)->value('filiere.id_filiere');
        $newSemestre=affectation_semestre::join('semestre','affectation_semestre.id_semestre','=','semestre.id_semestre')
        ->join('module','semestre.libelleSemestre','=','module.semestre')->where('affectation_semestre.id_etud',$id_etud)->get();
        /*$newSemestre=affectation_semestre::join('semestre','affectation_semestre.id_semestre','=','semestre.id_semestre')
        ->join('module','semestre.libelleSemestre','=','module.semestre')->where('')->get()*/
        $allModule=Module::where('id_filiere',$id_filiere)->get();
        $moduleAct=Affectation_etud::join('module','affectation_etud.id_module','=','module.id_module')->where('id_etud',$id_etud)->get();
        $profs=Affectation_prof::join('professeur','affectation_prof.id_prof','=','professeur.id_prof')->join('users','professeur.user_prof','=','users.id_user')->get();
        return view('MoreModules',compact(['moduleAct','allModule','profs']));
     }
    function test(){
        echo "bonjour";
    }
}
