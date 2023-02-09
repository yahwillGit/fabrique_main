@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liste des agents</h2> <br>
                    <a href="{{route('employes.create')}}"><button type="submit" class="btn btn-success mr-2">Nouveau</button></a>
                    <br><br>
                    <div> @include('layouts.notification')</div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Nom </th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Age</th>
                            <th>Type</th>
                            <th>Adresse </th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employes as $employe)
                        <tr>
                            <td>{{$employe->nom}} </td>
                            <td>{{$employe->prenom}} </td>
                            <td>{{$employe->sexe}} </td>
                            <td>{{$employe->age}} </td>
                            <td> {{$employe->type}}</td>
                            <td> {{$employe->adresse}} </td>
                            <td>
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('employes.edit', $employe->id)}}"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor{{$employe->id}}"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                    </div>
                                </div>
                            </td>
                            <div id="delete_doctor{{$employe->id}}" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <form action="{{route('employes.destroy', $employe->id)}}" method="POST">
                                            {{ method_field('delete') }}
                                               {{ csrf_field() }}
                                           <img src="sent.png" alt="" width="50" height="46">
                                        <h3>Voulez vous supprimer le client {{$employe->nom}}</h3>
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
