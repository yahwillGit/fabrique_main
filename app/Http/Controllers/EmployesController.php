<?php

namespace App\Http\Controllers;

use App\Employes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $employes = Employes::all();
        return view('pages.employes.index', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        return view('pages.employes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        Employes::create($request->all());

        return Redirect::route('employes.index')->with('success','Opération éffectuée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employes  $employes
     * @return \Illuminate\Http\Response
     */
    public function show(Employes $employes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employes  $employes
     * @return \Illuminate\Http\Response
     */
    public function edit(Employes $employes, $id)
    {
        //
        $employes = Employes::find($id);
        return view('pages.employes.edit', compact('employes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employes  $employes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employes $employes, $id)
    {
        //
         //
        $employes = Employes::find($id);

        //ensuite je passe a la mise à jour
        $employes->nom = Request('nom');
        $employes->adresse = Request('adresse');
        $employes->sexe = Request('sexe');
        $employes->prenom = Request('prenom');
        $employes->age = Request('age');
        $employes->type = Request('type');
        $employes->role = Request('role');

        $employes->save();

        return Redirect::route('employes.index')->with('success','Informations mise-à-jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employes  $employes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employes $employes,$id)
    {
        //
        Employes::destroy($id);

        return back()->with('success','Employé supprimé avec succès');
    }
}
