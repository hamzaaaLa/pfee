<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

use App\Models\Annonce;
use App\Models\Cours;
use App\Models\section;
use App\Models\affectation_section;
use App\Models\affectation_cours;
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
        $existingSections = Section::select('s.titre_section')
            ->join('affectation_section AS a', 'section.id_section', '=', 'a.id_section')
            ->join('module', 'a.id_module', '=', 'module.id_module')
            ->join('section AS s', 'a.id_section', '=', 's.id_section')
            ->where('module.id_module', $id_module)
            ->get()
            ->pluck('titre_section')
            ->toArray();

        // check if the requested section name already exists
        if (in_array($request->input('nomSection'), $existingSections)) {
            return response('section existe déjà');
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

    public function delete_section($id_section)
    {
        // Check if the section has courses
        $has_courses = affectation_cours::whereHas('section', function($query) use ($id_section){
            $query->where('id_section', $id_section);
        })->exists();

        if($has_courses){
            $id_cours = affectation_cours::select('id_cour')
                ->join('section', 'section.id_section', '=', 'affectation_cours.id_section')
                ->where('section.id_section', $id_section)
                ->get();
                
                affectation_cours::whereHas('section', function($query) use ($id_section){
                    $query->where('id_section', $id_section);
                })->delete();
            foreach($id_cours as $id){
                $cours = cours::find($id->id_cour);
                $cours->delete();
            }
            
        }

        // Delete the section
        affectation_section::where('id_section', $id_section)->delete();
        section::find($id_section)->delete();

        return redirect()->back()->with('success', 'La section a été supprimée avec succès!');
    }

    public function update_section(Request $request,$id_section){
        $section = new section();
        $section::where('id_section', $id_section)->update(['titre_section' => $request->input('nomSection')]);
        
        return redirect()->back()->with('success', 'La section a été modifiée avec succès!');;
    }

    public function add_cour(Request $request,$id_module)
    {
        $nomCours = $request->input('nomCours');
        $sectionCours = $request->input('sectionCours');
        
        if ($request->hasFile('fichierCours')) {
            $file = $request->file('fichierCours');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('cours', $fileName, 'public');
            $filePath = ''.$fileName;
        } else {
            return response('error', 400);
        }

        $id_section = Section::select('section.id_section')
            ->join('affectation_section','section.id_section','=','affectation_section.id_section')
            ->where('affectation_section.id_module', '=', $id_module)
            ->where('section.titre_section','=',$sectionCours)
            ->value('id_section');
    
        $cours = new Cours();
        $cours->libelleCour = $nomCours;
        $cours->contenu = $filePath;
        $cours->save();
        
        $affectation_cours= new affectation_cours();
        $affectation_cours->id_section=$id_section;
        $affectation_cours->id_cour=$cours->id_cour;
        $affectation_cours->save();
    
        return redirect()->back()->with('success', 'Cours créé avec succès.');
    }

    public function update_cour(Request $request,$id_cour)
    {
        $cours= new cours();
        $cours::where('id_cour',$id_cour)->update(['libelleCour'=>$request->input('nomCours')]);
        
        return redirect()->back()->with('success', 'La section a été modifiée avec succès!');;
    }
    public function delete_cour(Request $request,$id_cour){
        affectation_cours::where('id_cour',$id_cour)->delete();
        cours::find($id_cour)->delete();

        return redirect()->back()->with('success', 'Le cour a été supprimé avec succès!');
    }

    public function download($id_cour)
    {
        $cours = Cours::find($id_cour);
        if ($cours) {
            $pathToFile = storage_path('app/public/cours/'.$cours->contenu);
            $headers = [
                'Content-Type' => mime_content_type($pathToFile),
                'Content-Disposition' => 'attachment; filename="' . $cours->libelleCour . '"'
            ];
            return response()->download($pathToFile, $cours->libelleCour, $headers);
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
