<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfController extends Controller
{
    public function ajoutView(){
        return view('AjouterProfesseur');
    }
    //
}
