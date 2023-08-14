@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liste des intrants</h2> <br>
                    @can('addIntrants')
                    <a href="{{route('intrants.create')}}"><button type="submit" class="btn btn-success mr-2">Nouveau</button></a>
                    @endcan
                    <br><br>
                    <div> @include('layouts.notification')</div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Nom </th>
                            <th> Unité </th>
                            <th> Quantité totale </th>
                            <th> Quantité seuil </th>
                            <th>Prix standard</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($intrants as $intrant)
                        <tr>
                            <td>{{$intrant->nom}} </td>
                            <td> {{$intrant->unite}}</td>
                            <td> {{$intrant->quantite_totale}} </td>
                            <td> {{$intrant->quantite_seuil}}</td>
                            <td> {{$intrant->prix_standard}} </td>
                            <td>
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @can('editIntrants')
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleFormModal{{$intrant->id}}"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
                                        @endcan
                                        @can('deleteIntrants')
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor{{$intrant->id}}"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                        @endcan
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleFormModal{{$intrant->id}}" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                                    role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-simple">
                                    <form class="modal-content" action="{{route('intrants.update', $intrant->id)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">

                                        <h4 class="modal-title" id="exampleFormModalLabel">Modifier les informations du intrantsnisseurs</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <label for="exampleInputEmail3">Nom</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3" name="nom" value="{{$intrant->nom}}">
                                                <label for="exampleInputEmail3">Unité</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3" name="unite" value="{{$intrant->unite}}">
                                                <label for="exampleInputEmail3">Quantité totale</label>
                                                <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="quantite_totale" value="{{$intrant->quantite_totale}}">
                                                <label for="exampleInputEmail3">Quantité seuil</label>
                                                <input type="tel" class="form-control" min="0" id="exampleInputEmail3" name="quantite_seuil" value="{{$intrant->quantite_seuil}}">
                                                <label for="exampleInputEmail3">Prix standard</label>
                                                <input type="number" min="0" class="form-control" id="exampleInputEmail3" value="{{$intrant->prix_standard}}" name="prix_standard">
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

                            <div id="delete_doctor{{$intrant->id}}" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <form action="{{route('intrants.destroy', $intrant->id)}}" method="POST">
                                            {{ method_field('delete') }}
                                               {{ csrf_field() }}
                                           <img src="sent.png" alt="" width="50" height="46">
                                        <h3>Voulez vous supprimer le client {{$intrant->nom}}</h3>
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
