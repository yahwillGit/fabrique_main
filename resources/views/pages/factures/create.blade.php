@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouvelle facture</h2>
                    <form class="forms-sample form-row" method="POST" action="{{route('factures.store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Client</label>
                            <select class="form-control form-control-lg" name="client">
                                <option>----choisir----</option>
                                @foreach($clients as $client)
                                <option value={{$client->id}}> {{$client->nom}} </option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Montant HT</label>
                            <input type="number" class="form-control" id="exampleInputEmail3" name="montant_ht" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Montant TVA</label>
                            <input type="number" class="form-control" id="exampleInputEmail3" name="montant_tva" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Remise</label>
                            <input type="number" class="form-control" id="exampleInputEmail3" name="remise">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Ristourne</label>
                            <input type="number" class="form-control" id="exampleInputEmail3" name="ristourne">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Montant TTC</label>
                            <input type="number" class="form-control" id="exampleInputEmail3" name="montant_ttc" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Montant Reste</label>
                            <input type="number" class="form-control" id="exampleInputEmail3" name="montant_reste"  >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Fichier</label>
                            <input type="file" class="form-control" id="exampleInputEmail3" name="fichier"  >
                        </div>
                         <div class="form-group col-md-12">
                            <label for="exampleInputEmail3">Commentaire</label>
                            <input type="textarea" class="form-control" id="exampleInputEmail3" name="commentaire" >
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
