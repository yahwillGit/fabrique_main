@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liste des recettes</h2> <br>
                    @can('addRecettes')
                    <a href="#" data-toggle="modal" data-target="#addnew"><button type="submit" class="btn btn-success mr-2">Nouveau</button></a>
                    @endcan
                    <div class="modal fade" id="addnew" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                         role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-simple">
                            <form class="modal-content" action="{{route('recettes.store')}}" method="post">
                                @csrf
                                @method('POST')

                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleFormModalLabel">Ajouter une recette</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <label for="exampleInputEmail3">Libelle</label>
                                        <input type="text" class="form-control" id="exampleInputEmail3" name="libelle">
                                        <label for="exampleInputName1">Type de recette</label>
                                        <select class="form-control" id="exampleFormControlSelect2" name="typerecette_id">
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->libelle}}</option>
                                            @endforeach
                                        </select>
                                        <label for="exampleInputEmail3">Montant</label>
                                        <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="montant">
                                        <div class="col-md-12 float-right">
                                            <button type="submit" class="btn btn-primary" >Submit</button>
                                            <button type="reset" class="btn btn-warning" data-dismiss="modal">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br><br>
                    <div> @include('layouts.notification')</div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Libelle </th>
                            <th> Date </th>
                            <th> Montant </th>
                            <th> Type de recette </th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recettes as $recette)
                            <tr>
                                <td>{{$recette->libelle}} </td>
                                <td> {{$recette->date}}</td>
                                <td> {{$recette->montant}} </td>
                                <td> {{$recette->typerecette->libelle ?? ""}}</td>
                                <td>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @can('editRecettes')
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#update_doctor{{$recette->id}}"><i
                                            class="fa fa-pencil m-r-5"></i> Modifier</a>
                                            @endcan
                                            @can('deleteRecettes')
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#delete_doctor{{$recette->id}}"><i
                                            class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="modal fade" id="update_doctor{{$recette->id}}" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                                         role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-simple">
                                            <form class="modal-content" action="{{route('recettes.update',$recette->id)}}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">
                                                     <h4 class="modal-title" id="exampleFormModalLabel">Modifier une recette</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <label for="exampleInputEmail3">Libelle</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail3"
                                                        name="libelle" value="{{$recette->libelle}}">


                                                        <label for="exampleInputEmail3">Montant</label>
                                                        <input type="number" min="0" class="form-control" id="exampleInputEmail3"
                                                        name="montant" value="{{$recette->montant}}" >

                                                        <div class="col-md-12 float-right">
                                                            <button type="submit" class="btn btn-primary" >Submit</button>
                                                            <button type="reset" class="btn btn-warning" data-dismiss="modal">Reset</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </td>

                                <div id="delete_doctor{{$recette->id}}" class="modal fade delete-modal" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <form action="{{route('recettes.destroy', $recette->id)}}" method="POST">
                                                    {{ method_field('delete') }}
                                                    {{ csrf_field() }}
                                                    <img src="sent.png" alt="" width="50" height="46">
                                                    <h3>Voulez vous supprimer cette recette?</h3>
                                                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
