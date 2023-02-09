@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouvel utilisateur</h2>
                    <form class="forms-sample form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Nom</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Prénoms</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Prénoms">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Identifiant">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputEmail3" placeholder="Mot de passe">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Confirmation mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputEmail3" placeholder="Confirmation mot de passe">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Valider</button>
                        <button class="btn btn-light">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
