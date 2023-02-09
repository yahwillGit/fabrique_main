@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Détails de la facture N° {{$facture->id}}</h2> <br>

                    <div class="row">
                        <div class="col-6">
                            <h5>Date: {{$facture->created_at}}</h5>
                            <h5>Client: {{$facture->client->nom}}; {{$facture->client->telephone}}</h5>
                        </div>
                        <div class="col-6">
                            <h5>Montant total: {{$facture->montant_ht}}</h5>
                            <div class="row">
                                <h5>Ristourne: {{$facture->ristourne}}</h5>
                                @if ($facture->ristourne == 0)
                                    <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalRistourne">Ajouter</button>
                                @endif
                            </div>
                            <h5>Reste à payer : {{$facture->montant_reste}}</h5>
                        </div>
                    </div>
                    <br>
                    <h3>Etat des règlements:</h3>

                        <ul>
                            @foreach($facture->reglements as $reglement)
                                <li>{{$reglement->created_at}} - {{$reglement->montant}}</li>
                            @endforeach
                        </ul>
                        @if ($facture->montant_reste == 0)
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>La facture est soldée</strong>
                            </div>
                        @else

                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalReglement">Ajouter</button>
                        @endif

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalReglement" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
            <form class="modal-content" action="{{route('reglements.store')}}" method="post">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title" id="exampleFormModalLabel">Enregistrer un règlement</h4>
                </div>
                <input type="hidden" name="facture_id" value="{{$facture->id}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-9">
                            <label for="exampleInputEmail3">Montant</label>
                            <input type="number" class="form-control" max="{{$facture->montant_reste}}"
                                   id="exampleInputEmail3" name="montant">
                        </div>
                        <div class="form-group col-9">
                            <label for="exampleInputEmail3">Commentaire (optionnel)</label>
                            <input type="text" class="form-control"
                                   id="exampleInputEmail3" name="commentaire">
                        </div>
                        <div class="form-group col-9">
                            <button type="submit" class="btn btn-primary">Valider</button>
                            <button type="reset" class="btn btn-warning"
                                    data-dismiss="modal">Annuler
                            </button>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="modal fade" id="modalRistourne" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
            <form class="modal-content" action="{{route('facture.ristourne')}}" method="post">
                @csrf
                <input type="hidden" name="facture_id" value="{{$facture->id}}">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleFormModalLabel">Accorder une
                        ristourne</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-9">
                            <label for="exampleInputEmail3">Montant</label>
                            <input type="number" class="form-control"
                                   id="exampleInputEmail3" name="ristourne">
                        </div>
                        <div class="form-group col-9">
                            <button type="submit" class="btn btn-primary">Valider</button>
                            <button type="reset" class="btn btn-warning"
                                    data-dismiss="modal">Annuler
                            </button>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
