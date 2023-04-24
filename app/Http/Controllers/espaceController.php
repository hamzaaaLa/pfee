<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

use App\Models\Annonce;
use App\Models\Cours;
use App\Models\section;
use App\Models\affectation_section;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Professeur;
use App\Models\posts;
use App\Models\reply;

class espaceController extends Controller
{
    public function store(Request $request, $id_module)
    {       
        $professeur = auth()->user();
        $id_prof = professeur::where('user_prof', $professeur->id_user)->value('id_prof');

        // fetch all existing section titles
        $existingSections = Section::where('id_prof', $id_prof)->pluck('titre_section')->toArray();

        // check if the requested section name already exists
        if (in_array($request->input('nomSection'), $existingSections)) {
            return response('section deja existé');
        }

        $section = new Section();
        $section->titre_section = $request->input('nomSection');
        $section->id_prof = $id_prof;
        $section->save();

        //affectation section 
        $affectation = new affectation_section();
        $affectation->id_module = $id_module;
        $affectation->id_section = $section->id_section;
        $affectation->save();

        return response('success');
    }

    public function add_cour(Request $request, $id_module)
    {
        // dd($request->all());

        $nomCours = $request->input('nomCours');
        $sectionCours = $request->input('sectionCours');
        
        if ($request->hasFile('fichierCours')) {
            $file = $request->file('fichierCours');
            // dd($file);
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('cours'), $fileName);
            $contents = file_get_contents(public_path('cours').'/'.$fileName);
        } else {
            return response('error', 400);
        }
        
        $id_section = Section::select('id_section')
            ->where('titre_section', '=', $sectionCours)
            ->value('id_section');
    
        $cours = new Cours();
        $cours->libelleCour = $nomCours;
        $cours->contenu = $contents;
        $cours->id_module = $id_module;
        $cours->id_section = $id_section;
        $cours->save();
    
        // return response('success');
        return redirect()->back()->with('success', 'Cours créée avec succès.');
    }

    public function download($id_cour)
    {
        $cours = DB::table('cours')->select('contenu')->where('id_cour', $id_cour)->first();
        if ($cours) {
            $response = new Response($cours->contenu, 200);
            $response->header('Content-Type', 'application/octet-stream');
            $response->header('Content-Disposition', 'attachment; filename="' . $id_cour . '.pdf"');
            return $response;
        } else {
            abort(404);
        }
    }
    public function store_posts(Request $request,$id_module){
        $id_user = auth()->user()->id_user;
        $posts = new posts();
        $posts->id_user = $id_user;
        $posts->titre = $request->input('titre');
        $posts->contenu = $request->input('contenue');
        $posts->id_module = $id_module;
        $posts->save();
        return back()->with('success', 'Post added successfully!');
    }

    public function store_reply(Request $request,$id_module,$id_post){
        $id_user = auth()->user()->id_user;
        $reply = new reply();
        $reply->id_post = $id_post;
        $reply->id_user = $id_user;
        $reply->contenu = $request->input('reply');
        $reply->id_module = $id_module;
        $reply->save();
        return back()->with('success', 'Post added successfully!');
    }
}
