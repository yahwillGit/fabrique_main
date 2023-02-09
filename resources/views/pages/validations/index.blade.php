@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Validations en attente</h2> <br>
                    <br><br>
                    <div> @include('layouts.notification')</div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Désignation </th>
                            <th> Demandé par </th>
                            <th> Montant </th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($validations as $validation)
                        <tr>
                            <td>{{$validation->designation}} </td>
                            <td> {{$validation->user->name}}</td>
                            <td> {{$validation->montant_propose}} </td>
                            <td>
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('depenses.valider',$validation->depense_id)}}"><i class="fa fa-pencil m-r-5"></i> Accepter</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor{{$validation->id}}"><i class="fa fa-trash-o m-r-5"></i> Refuser</a>
                                    </div>
                                </div>
                                {{--<div class="modal fade" id="exampleFormModal{{$validation->id}}" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                                    role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-simple">
                                    <form class="modal-content" action="{{route('fournisseurs.update', $validation->id)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">

                                        <h4 class="modal-title" id="exampleFormModalLabel">Modifier les informations du fournisseurs</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <label for="exampleInputEmail3">Nom</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3" name="nom" value="{{$four->nom}}">
                                                <label for="exampleInputEmail3">Email</label>
                                                <input type="tel" class="form-control" id="exampleInputEmail3" name="email" value="{{$four->email}}">
                                                <label for="exampleInputEmail3">Adresse</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3" name="adresse" value="{{$four->adresse}}">
                                                <label for="exampleInputEmail3">Téléphone</label>
                                                <input type="tel" class="form-control" id="exampleInputEmail3" name="telephone" value="{{$four->telephone}}">
                                                <div class="col-md-12 float-right">
                                                <button type="submit" class="btn btn-primary" >Submit</button>
                                                <button type="reset" class="btn btn-warning" data-dismiss="modal">Reset</button>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                    </div>
                            </div>--}}
                            </td>

                            <!-- End Modal -->

<!--                             -------------------------------------------------------------------------------- -->
                            {{--<div id="delete_doctor{{$four->id}}" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <form action="{{route('fournisseurs.destroy', $four->id)}}" method="POST">
                                            {{ method_field('delete') }}
                                               {{ csrf_field() }}
                                           <img src="sent.png" alt="" width="50" height="46">
                                        <h3>Voulez vous supprimer le fournisseur {{$four->nom}}</h3>
                                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            </div>--}}
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
