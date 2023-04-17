<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\User;
use App\Models\Affectation_etud;
use App\Models\affectation_prof;
use App\Models\Module;
use App\Models\professeur;

class ProfController extends Controller
{
    public function index()
    {
        $professeur =\App\Models\professeur::all();
        return view('visualiserProf', ['professeur' => $professeur]); 
    }

    public function ajoutView(){
        return view('AjouterProfesseur');
    }

    public function add(Request $request){
        $request->validate([
            'name'=>'required',
            'prenom'=>'required',
            'email'=>'required|email|unique:users',
        ]);

        $user=new User();
        $prof=new professeur();
        $user->type=2;
        $user->name=$request->input('name');
        $user->prenom=$request->input('prenom');
        $user->email=$request->input('email');
        $user->cin=$request->input('cin');
        $user->telephone=$request->input('tel');
        $user->nomUtilisateur=$request->input('email');
        $user->password=bcrypt($request->input('cin'));
        $user->save();

        $prof->specialite=$request->input('specialite');
        $prof->user_prof=$user->id_user;
        $prof->save();

        return redirect()->back();
    }

    public function edit($id_user){
        $users=User::where('id_user',$id_user)->first();
        $prof=User::join('professeur','users.id_user','=','professeur.user_prof')->where('id_user',$id_user)->first();
        return view('ModifierProfesseur',compact(['prof','users']));
    }

    public function update(Request $request,$id_user){
        User::where('id_user',$id_user)->update([
            'name'=>$request->name,
            'prenom'=>$request->prenom,
            'email'=>$request->email,
            'nomUtilisateur'=>$request->email,
            'cin'=>$request->cin,
            'telephone'=>$request->tel,

        ]);

        professeur::where('user_prof',$id_user)->update([
            'specialite'=>$request->specialite,
        ]);

        return redirect(route('afficheProf'));
    }

    public function delete($id_user){
        $id_prof=User::join('professeur','users.id_user','=','professeur.user_prof')->where('users.id_user',$id_user)->value('professeur.id_prof');
        affectation_prof::where('id_prof','=',$id_prof)->delete();
        professeur::where('user_prof','=',$id_user)->delete();
        User::where('id_user','=',$id_user)->delete();
        
        
        return redirect(route('afficheProf'));
    }
    //
}
