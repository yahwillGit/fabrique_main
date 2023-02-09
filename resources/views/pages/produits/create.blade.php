@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouveau produit</h2>
                    <form class="forms-sample form-row" method="POST" action="{{route('produits.store')}}">
                        @csrf
                        @method('POST')

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Nom</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="nom">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Description</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="description">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail3">Prix standard</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="prix_standard">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail3">Quantité disponible</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="qte_stock">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail3">Quantité seuil</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="qte_seuil">
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
