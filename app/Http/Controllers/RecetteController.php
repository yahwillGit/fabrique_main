<?php

namespace App\Http\Controllers;

use App\Recette;
use App\Typerecette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $recettes = [];
        // $typerecettes = [];
        // $arrecettes = [];
        // foreach ($recettes as $key => $recette) {
        //     foreach ($typerecettes as $key => $typerecette) {
        //         if($recette->type_recette_id == $typerecette->id){
        //             // $recettes[$key]->Typerecette = $typerecette;
        //             array_push($arrecettes, $recette);
        //             break;
        //         }
        //     }
        // }
        $recettes = Recette::all();
        $types = Typerecette::all();
        // dd($recettes);
        return view('pages.recettes.index', compact('recettes','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $recettes = new Recette();
        $recettes->date = date("Y-m-d");
        $recettes->typerecette_id = $request->typerecette_id;
        $recettes->montant = $request->montant;
        $recettes->libelle = $request->libelle;
        $recettes->save();

        return Redirect::route('recettes.index')->with('success','Opération éffectuer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function show(Recette $recette)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function edit(Recette $recette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $recettes = Recette::find($id);
        $recettes->montant = $request->montant;
        $recettes->libelle = $request->libelle;
        $recettes->save();

        return Redirect::route('recettes.index')->with('success','Informations mise-à-jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Recette::destroy($id);
        return Redirect::route('recettes.index')->with('success','Suppression éffectuée avec succès');
    }
}
