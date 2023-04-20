<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Annonce;
use App\Models\Cours;
use App\Models\section;
use App\Models\affectation_section;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Professeur;
use App\Models\User;


class AdminController extends Controller
{
    public function getProfile($id_user){
        $admin=User::join('administrateur','users.id_user','=','administrateur.user_admin')->where('users.id_user',$id_user)->first();

        return view('ProfileAdmin',compact(['admin']));
    }

    public function updateProfile(Request $request,$id_user){
        User::join('administrateur','users.id_user','=','administrateur.user_admin')->where('users.id_user',$id_user)->update([
            'name'=>$request->name,
            'prenom'=>$request->prenom,
            'email'=>$request->email,
            'cin'=>$request->cin,
            'telephone'=>$request->tel,
            'nomUtilisateur'=>$request->email,
            'password'=>bcrypt($request->cin),
            'dateEmbauche'=>$request->dateEmbauche,
        ]);
        return redirect()->back();
    }
    //
}
