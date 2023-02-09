@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouvel agent</h2>
                    <form class="forms-sample form-row" method="POST" action="{{route('employes.store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" min="0" max="80" name="age">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type">
                                <option>Agent de production</option>
                                <option>Agent de chargement</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sexe">Sexe</label>
                            <select class="form-control" id="sexe" name="sexe">
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-success mr-2">Valider</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
