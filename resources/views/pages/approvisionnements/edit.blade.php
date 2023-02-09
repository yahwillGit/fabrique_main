@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouvel approvisionnement</h2>
                    <form class="forms-sample form-row" method="POST" action="{{route('approvisionnements.update', $approvisionnements->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Fournisseur</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="fournisseur_id">
                               @foreach($fournisseurs as $fournisseurs)
                                    <option @if ($fournisseurs->id==$approvisionnements->fournisseur_id) selected @endif value = '{{$fournisseurs->id}}' >
                                        {{$fournisseurs->nom}}

                                    </option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Intrant</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="intrant_id">
                                @foreach($intrants as $intrants)
                                    <option @if ($intrants->id==$approvisionnements->intrant_id) selected @endif value = '{{$intrants->id}}' >
                                        {{$intrants->nom}}

                                    </option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Quantité</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="quantite" value="{{$approvisionnements->quantite}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Prix unitaire</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="prix_unitaire" value="{{$approvisionnements->prix_unitaire}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Prix TTC</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="prix_ttc" value="{{$approvisionnements->prix_ttc}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Facture</label>
                            <input type="file" class="form-control"  id="exampleInputEmail3" name="facture" value="{{$approvisionnements->facture}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Date standard</label>
                            <input type="date" class="form-control" id="exampleInputEmail3" name="date" value="{{$approvisionnements->date}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Commentaire</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="commentaire" value="{{$approvisionnements->commentaire}}">
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
