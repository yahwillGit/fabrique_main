@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liste des rôles</h2> <br>
                    <a href="{{route('clients.create')}}"><button type="submit" class="btn btn-success mr-2">Nouveau</button></a>
                    <br><br>
                    <div> @include('layouts.notification')</div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Nom </th>
                            <th> Adresse </th>
                            <th> Telephone </th>
                            <th> Email </th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $clients)
                        <tr>
                            <td>{{$clients->nom}} </td>
                            <td> {{$clients->adresse}}</td>
                            <td> {{$clients->telephone}} </td>
                            <td> {{$clients->email}} </td>
                            <td>
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleFormModal{{$clients->id}}"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor{{$clients->id}}"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleFormModal{{$clients->id}}" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                                    role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-simple">
                                    <form class="modal-content" action="{{route('clients.update', $clients->id)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">

                                        <h4 class="modal-title" id="exampleFormModalLabel">Modifier les informations du client</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <label for="exampleInputEmail3">Nom</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3" name="nom" value="{{$clients->nom}}">
                                                <label for="exampleInputEmail3">Email</label>
                                                <input type="tel" class="form-control" id="exampleInputEmail3" name="email" value="{{$clients->email}}">
                                                <label for="exampleInputEmail3">Adresse</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3" name="adresse" value="{{$clients->adresse}}">
                                                <label for="exampleInputEmail3">Téléphone</label>
                                                <input type="tel" class="form-control" id="exampleInputEmail3" name="telephone" value="{{$clients->telephone}}">
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

                            <!-- End Modal -->

<!--                             -------------------------------------------------------------------------------- -->
                            <div id="delete_doctor{{$clients->id}}" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <form action="{{route('clients.destroy', $clients->id)}}" method="POST">
                                            {{ method_field('delete') }}
                                               {{ csrf_field() }}
                                           <img src="sent.png" alt="" width="50" height="46">
                                        <h3>Voulez vous supprimer le client {{$clients->nom}}</h3>
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
