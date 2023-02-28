@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouvel approvisionnement</h2>
                    <form class="forms-sample form-row" method="POST" action="{{route('approvisionnements.store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Fournisseur</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="fournisseur_id">
                                @foreach($fournisseurs as $fournisseur)
                                    <option value={{$fournisseur->id}}>{{$fournisseur->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Intrant</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="intrant_id">
                                @foreach($intrants as $intrant)
                                    <option value={{$intrant->id}}>{{$intrant->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Quantité</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="quantite">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Prix unitaire</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="prix_unitaire">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Prix TTC</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="prix_ttc">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Facture</label>
                            <input type="file" class="form-control"  id="exampleInputEmail3" name="facture">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Date</label>
                            <input type="date" class="form-control" id="exampleInputEmail3" name="date">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Commentaire</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="commentaire">
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-success mr-2">Valider</button>
                            <button class="btn btn-light">Annuler</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
