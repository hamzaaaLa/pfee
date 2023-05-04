<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Administrateur;


class AdminController extends Controller
{
    public function index()
    {
        $admin = Administrateur::all();
        return view('visualiserAdmin', ['admin' => $admin]);
    }

    public function addAdminView(){
        return view('AjouterAdmin');
    }

    function addAdmin(Request $request) {

        $user = new User;

        $user->type = 1;
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->cin = $request->input('cin');
        $user->telephone = $request->input('tel');
        $user->nomUtilisateur = $request->input('email');
        $user->password = bcrypt($request->input('cin'));

        $user->save();

        $admin = new Administrateur;

        $admin->dateEmbauche = $request->input('dateEmbauche');
        $admin->user_admin = $user->id_user;

        $admin->save();

        return redirect()->back();
    }

    public function modifierAdminView($id_user) {
        $user = User::where('id_user', $id_user)->first();

        $admin = User::join('administrateur', 'users.id_user', '=', 'administrateur.user_admin')
            ->where('id_user', $id_user)->first();

        return view('ModifierAdmin', compact(['admin', 'user']));
    }

    public function modifierAdmin(Request $request, $id_user) {

        User::where('id_user', $id_user)
            ->update([
                'name'=>$request->name,
                'prenom'=>$request->prenom,
                'email'=>$request->email,
                'cin'=>$request->cin,
                'telephone'=>$request->tel,
                'password'=>bcrypt($request->cin),
                'nomUtilisateur'=>$request->email,
            ]);

        return redirect(route('afficheAdminView'));

    }

    public function supprimerAdmin($id_user) {

        Administrateur::where('user_admin', '=', $id_user)->delete();
        User::where('id_user', '=', $id_user)->delete();

        return redirect(route('afficheAdminView'));

    }

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
        return redirect()->back();
    }

    //
}
