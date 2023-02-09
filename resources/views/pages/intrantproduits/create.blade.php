@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouvelle correspondance </h2>
                    <form class="forms-sample form-row" method="POST" action="{{route('intrantproduits.store')}}">
                        @csrf
                        @method('POST')

                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Produit</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="produit_id">
                                @foreach($produits as $produits)
                                    <option value={{$produits->id}}>{{$produits->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Intrant</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="intrant_id">
                                @foreach($intrants as $intrants)
                                    <option value={{$intrants->id}}>{{$intrants->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Quantité intrant</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="quantite_intrant">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Quantité produit</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="quantite_produit">
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
