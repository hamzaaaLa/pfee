<?php

namespace App\Http\Controllers;

use App\Models\affectation_semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\User;
use App\Models\Affectation_etud;
use App\Models\Module;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiant =\App\Models\etudiant::all();
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
        User::where('id_user',$id_user)->update([
        'name'=>$request->input('name'),
        'prenom'=>$request->input('prenom'),
        'email'=>$request->input('email'),
        'cin'=>$request->input('cin'),
        'telephone'=>$request->input('tel'),
        'nomUtilisateur'=>$request->input('email'),
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

    function test(){
        echo "bonjour";
    }
}
