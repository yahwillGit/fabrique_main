<?php

namespace App\Http\Controllers;

use App\Typerecette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TyperecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = Typerecette::all();
        return view('pages.typerecettes.index', compact('types'));
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
        Typerecette::create($request->all());

        return Redirect::route('typerecettes.index')->with('success','Opération éffectuer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Typerecette  $typerecette
     * @return \Illuminate\Http\Response
     */
    public function show(Typerecette $typerecette)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Typerecette  $typerecette
     * @return \Illuminate\Http\Response
     */
    public function edit(Typerecette $typerecette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Typerecette  $typerecette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $types = Typerecette::find($id);

        //ensuite je passe a la mise à jour
        $types->libelle = Request('libelle');
        $types->save();

        return back()->with('success','Informations mise-à-jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Typerecette  $typerecette
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Typerecette::destroy($id);

        return back()->with('success','Type supprimé avec succès');
    }
}
