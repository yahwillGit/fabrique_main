@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liste des approvisionnements</h2> <br>
                    <a href="{{route('approvisionnements.create')}}"><button type="submit" class="btn btn-success mr-2">Nouveau</button></a>
                    <br><br>
                    <div> @include('layouts.notification')</div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Fournisseur </th>
                            <th> Intrant </th>
                            <th> Prix unitaire </th>
                            <th> Quantité  </th>
                            <th>Prix TTC</th>
                            <th>Facture</th>
                            <th>Date</th>
                            <th>Commentaire</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($approvisionnements as $approvisionnement)
                        <tr>
                            <td>{{$approvisionnement->nom_four}} </td>
                            <td> {{$approvisionnement->nom_intrant}}</td>
                            <td> {{$approvisionnement->prix_unitaire}} </td>
                            <td> {{$approvisionnement->quantite}}</td>
                            <td> {{$approvisionnement->prix_ttc}} </td>
                            <td> {{$approvisionnement->facture}} </td>
                            <td> {{$approvisionnement->date}} </td>
                            <td> {{$approvisionnement->commentaire}} </td>
                            <td>
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('approvisionnements.edit', $approvisionnement->id)}}"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor{{$approvisionnement->id}}"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                    </div>
                                </div>
                            </td>

                            <div id="delete_doctor{{$approvisionnement->id}}" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <form action="{{route('approvisionnements.destroy', $approvisionnement->id)}}" method="POST">
                                            {{ method_field('delete') }}
                                               {{ csrf_field() }}
                                           <img src="sent.png" alt="" width="50" height="46">
                                        <h3>Voulez vous supprimer cet approvisionnement?</h3>
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
