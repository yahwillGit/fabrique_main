<?php

namespace App\Http\Controllers;

use App\Depense;
use App\Models\Image;
use App\Typedepense;
use App\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $depenses = Depense::all();
        $types = Typedepense::all();
        return view('pages.depenses.index', compact('depenses','types'));
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
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        $depenses = new Depense();
        $depenses->date = date("Y-m-d");
        $depenses->typedepense_id = $request->typedepense_id;
        $depenses->montant = $request->montant;
        $depenses->libelle = $request->libelle;
        $depenses->save();

        $fichier = $request->file('fichier');
        $fichierName = Str::slug($depenses->libelle).'-'. time() .'.'.$fichier->extension();
        $fichier->move(public_path('justificatifs'), $fichierName);
        $depenses->fichier = $fichierName;
        $depenses->save();

        $validation = new Validation();
        $validation->designation = $request->libelle;
        $validation->montant_propose = $request->montant;
        $validation->user_id = auth()->id();
        $validation->save();

        return Redirect::route('depenses.index')->with('success','Opération éffectuer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function show(Depense $depense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function edit(Depense $depense)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $depenses = Depense::find($id);
        $depenses->montant = $request->montant;
        $depenses->libelle = $request->libelle;
        $depenses->save();

        return Redirect::route('depenses.index')->with('success','Informations mise-à-jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Depense::destroy($id);
        return Redirect::route('depenses.index')->with('success','Suppression éffectuée avec succès');

    }
}
