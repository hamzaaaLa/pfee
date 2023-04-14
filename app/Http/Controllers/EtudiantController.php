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
        $etudiant->filiere=$request->input('semestreSelect');
        $etudiant->user_etud=$user->id_user;
        $etudiant->save();

        
        $semestreValues=$request->input('selectedSemestres');
       // $semestreValues = implode(",", $semestreValues);
        //$semestreValues = explode(",", $semestreValues);
        
        foreach($semestreValues as $key){
            $affectSemestre=new affectation_semestre();
            $affectSemestre->id_etud=$etudiant->id_etud;
            $affectSemestre->id_semestre=Semestre::where($key,'libilleSemestre')->select('id_semestre')->get();
            $affectSemestre->save();
        }

        $moduleValues=$request->input('moduleValues');
        $moduleValues = implode(",", $moduleValues);
        $moduleValues = explode(",", $moduleValues);
        
        foreach($moduleValues as $key){
            $affectEtud=new Affectation_etud();
            $affectEtud->id_etud=$etudiant->id_etud;
            $affectEtud->id_module=Module::where($key,'libilleModule')->select('id_module')->get();
            $affectEtud->save();
        }



        return response("success");

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
        
    public function edit($id_etud){
        return view('adminEditEtud',[
            'etudiant'=>Etudiant::where('id_etud',$id_etud)->first()
        ]);
    }

    public function update(Request $request,$id_etud){
        Etudiant::where('id_etud',$id_etud)->update([
            'nom'=>$request->name,
            'prenom'=>$request->prenom,
            'email'=>$request->email,
            'cne'=>$request->cne
        ]);
        
        return redirect(route('afficheEtud'));
    }

    function test(){
        echo "bonjour";
    }
}
