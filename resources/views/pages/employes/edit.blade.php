@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Modifier client</h2>
                    <form class="forms-sample form-row" method="POST" action="{{route('employes.update',$employes->id)}}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Nom</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="nom" value="{{$employes->nom}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Prénom</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="prenom" value="{{$employes->prenom}}">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Age</label>
                            <input type="number" class="form-control" id="exampleInputEmail3" min="0" name="age" value="{{$employes->age}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Type</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="type" value="{{$employes->type}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Role</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="role" value="{{$employes->role}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Adresse</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" name="adresse" value="{{$employes->adresse}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputName1">Sexe</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="sexe">
                                <option value="{{$employes->sexe}}">{{$employes->sexe}}</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div> 
                        
                        <!--<div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Numero de compte</label>
                            <input type="number" class="form-control" id="exampleInputEmail3" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">R.C.C.M</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" >
                        </div>
                         <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Email</label>
                            <input type="tel" class="form-control" id="exampleInputEmail3" >
                        </div> -->
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
