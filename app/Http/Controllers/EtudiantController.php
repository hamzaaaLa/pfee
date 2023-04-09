<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Etudiant;
use App\Models\User;

class EtudiantController extends Controller
{
    function add(Request $request){
        $request->validate([
            'name'=>'required',
            'prenom'=>'required',
            'email'=>'required|email|unique:etudiants',
        ]);


        /*$query=DB::table('etudiants')->insert([
            'nom'=>$request->input('name'),
            'prenom'=>$request->input('prenom'),
            'email'=>$request->input('email'),
        ]);*/
        $etudiant = new Etudiant;
        $etudiant->nom = $request->input('name');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->email = $request->input('email');
        $etudiant->cne = $request->input('cne');
        $etudiant->cin=$request->input('cne');
        $etudiant->telephone=$request->input('telephone');
        $etudiant->filiere=$request->input('filiere');
        $etudiant->semestre=$request->input('semestre');
        $etudiant->module1=$request->input('module1');
        $etudiant->module2=$request->input('module2');
        $etudiant->module3=$request->input('module3');
        $etudiant->module4=$request->input('module4');
        $etudiant->module5=$request->input('module5');
        $etudiant->module6=$request->input('module6');
        $etudiant->module7=$request->input('module7');

        $user=new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->email_verified_at=null;
        $user->password = bcrypt($request->input('cne'));
        $user->type=0;
        $user->remember_token=null;
        $user->created_at=now();
        $user->updated_at=now();
        
        
        $etudiant->save();
        $user->save();

        return redirect()->back()->with([
            'message' => 'Etudiant added successfully!', 
            'status' => 'success'
        ]);

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
