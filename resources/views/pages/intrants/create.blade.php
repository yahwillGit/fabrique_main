@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouveau intrant</h2>
                    <form class="forms-sample form-row" method="POST" action="{{route('intrants.store')}}">
                        @csrf
                        @method('POST')

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Nom</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="nom">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Unité</label>
                            <select class="form-control" name="unite">
                                <option>Kilogramme</option>
                                <option>Tonne</option>
                                <option>Litre</option>
                                <option>Voyage</option>
                                <option>Camion</option>
                                <option>Unité</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Quantité disponible</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="quantite_totale">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Quantité seuil</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="quantite_seuil">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail3">Prix standard</label>
                            <input type="number" class="form-control" min="0" id="exampleInputEmail3" name="prix_standard">
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
