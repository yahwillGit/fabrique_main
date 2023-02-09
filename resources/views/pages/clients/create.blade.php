@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouveau client</h2>
                    <form class="forms-sample form-row" method="POST" action="{{route('clients.store')}}">
                        @csrf
                        @method('POST')

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Nom</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="nom">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Email</label>
                            <input type="tel" class="form-control" id="exampleInputEmail3" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Adresse</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="adresse">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Téléphone</label>
                            <input type="tel" class="form-control" id="exampleInputEmail3" name="telephone">
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
