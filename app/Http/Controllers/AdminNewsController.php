<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AdminNewsController extends Controller
{
    //
    public function index(){

        // $actus = News::all() ; // Lister les news

        $actus = News::orderBy('created_at','desc')->paginate(5) ; // Lister les news dans l'ordre décroissant par rapport à la table createde_at

        return view("adminnews.liste", compact('actus'));
    }

    /*public function index(){
        $resultNews = News::all() ;
        return view('accueil', compact('resultNews')) ;
    }*/
    public function formAdd(){ // Affichage de mon formulaire

        return view('adminnews.edit');
    }
    public function add(Request $request){ // Ajout des informations
        $newsModel = new News ; // Création d'une instance de class ( model News ) pour enregistrer en base

        /* Vérification des données du formulaire
                  *    titre obligatoire    */
        $request->validate(['titre'=>'required|min:5']); 
        // Traitement de l'envoi de l'image sur le serveur 
        if ($request->file()) {
            $fileName = $request->image->store('public/images');
            $newsModel->image = $fileName;
        }

        $newsModel->titre = $request->titre ;
        $newsModel->description = $request->description;
        $newsModel->save() ; // Enregistrement des données

        return Redirect::route('news.add');

    }

    public function formEdit($id){
        
        $actu = News::findOrFail($id) ; 

        return view('adminnews.edit', compact('actu'));
    }

    public function edit(Request $request ,$id){

        $actu = News::findOrFail($id) ; // Création d'une instance de class (model News à modifier à partir de l'id)
        $request->validate(['titre'=>'required|min:5']);
        $actu->titre = $request->titre ;
        $actu->description = $request->description;
        $actu->save() ;

        return Redirect::route('news.liste');
    }
    
    public function delete($id)
    {
        $actu = News::findOrFail($id) ; // Touver une news à partir de l'id
        if ($actu->image != '') { // Vérification de l'existence du fichier 
            Storage::delete($actu->image); // Suppression du fichier
        }
        $actu->delete() ; // Suppression de la news dans la base de données
        return Redirect::route('news.liste');

    }
    
}
