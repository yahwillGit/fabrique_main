<?php

namespace App\Http\Controllers;

use App\Typedepense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TypedepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = Typedepense::all();
        return view('pages.typedepenses.index', compact('types'));
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
        Typedepense::create($request->all());

        return Redirect::route('typedepenses.index')->with('success','Opération éffectuer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Typedepense  $typedepense
     * @return \Illuminate\Http\Response
     */
    public function show(Typedepense $typedepense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Typedepense  $typedepense
     * @return \Illuminate\Http\Response
     */
    public function edit(Typedepense $typedepense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Typedepense  $typedepense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $reques, $id)
    {
        //
        $types = Typedepense::find($id);

        //ensuite je passe a la mise à jour
        $types->libelle = Request('libelle');
        $types->save();

        return back()->with('success','Informations mise-à-jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Typedepense  $typedepense
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        Typedepense::destroy($id);

        return back()->with('success','Type supprimé avec succès');
    }
}
