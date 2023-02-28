@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liste des factures</h2> <br>
                    <a href="{{route('factures.create')}}"><button type="submit" class="btn btn-success mr-2">Nouveau</button></a>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Date</th>
                            <th> Client</th>
                            <th> Telephone</th>
                            <th> Total</th>
                            <th> Reste à payer</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($factures as $facture)
                            <tr>
                                <td>{{$facture->created_at}} </td>
                                <td> {{$facture->client->nom}}</td>
                                <td> {{$facture->client->telephone}} </td>
                                <td style="background: {{$facture->montant_reste == 0 ? '': "red"}}; color: {{$facture->montant_reste == 0 ? '': "white"}};"> {{$facture->montant_ht}} </td>
                                <td> {{$facture->montant_reste ?? 0}} </td>
                                <td>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('factures.show',$facture->id)}}"><i class="fa fa-pencil m-r-5"></i> Détails</a>
                                            <a class="dropdown-item" target="_blank"
                                               href="{{'http://localhost:8888/fabrique/storage/app/public/'. $facture->fichier }}"><i
                                                    class="fa fa-pencil m-r-5"></i> Voir le fichier</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalRistourne{{$facture->id}}"><i class="fa fa-trash-o m-r-5"></i> Accorder une ristourne </a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
