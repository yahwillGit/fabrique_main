@section('head')



@endsection

@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liste des ventes</h2>
                    <div class="panel-body container-fluid">
                        <div class="panel panel-heading" id="ok">
                            @if (session()->has('ok'))
                                @include('layouts/notifications', [
                                    'type' => 'info',
                                    'message' => session('ok'),
                                ])
                            @endif
                        </div>

                        <!-- TABLE TO LIST THE SALES-->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Date de la vente </th>
                                    <th> Client </th>
                                    <th> Produit </th>
                                    <th> Quantité </th>
                                    <th> Total </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop browsed with $sale -->
                                @foreach ($clientproduit as $sale)
                                    <tr>
                                        <td>{{ $sale->date_vente->format('Y-m-d') }}</td>
                                        <td>{{ $sale->Client->nom }}</td>
                                        <td>{{ $sale->Produit->nom }} | {{ $sale->Produit->description }}</td>
                                        <td>{{ $sale->qte }}</td>
                                        <td>{{ $sale->Produit->prix_standard * $sale->qte }} XOF</td>
                                        <td>
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#UpdateFormModal{{$sale->id}}"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteFormModal{{$sale->id}}"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="UpdateFormModal{{$sale->id}}" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                                                role="dialog" tabindex="-1">
                                                <div class="modal-dialog modal-simple">
                                                <form class="modal-content" action="{{route('ventes.update', $sale->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">

                                                    <h4 class="modal-title" id="exampleFormModalLabel">Modifier les informations de la vente</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <label for="exampleInputEmail3">Client</label>
                                                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="client_id" value="{{$sale->client_id}}">
                                                            <select class="form-control" id="exampleFormControlSelect2" name="client_id">
                                                               @foreach($clients as $client)
                                                                    <option @if ($client->id==$sale->client_id) selected @endif value = '{{$client->id}}' >
                                                                        {{$client->nom}}

                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            <label for="exampleInputName1">Produits</label>
                                                            <select class="form-control" id="exampleFormControlSelect2" name="produit_id">
                                                               @foreach($produits as $produit)
                                                                    <option @if ($produit->id==$sale->produit_id) selected @endif value = '{{$produit->id}}' >
                                                                        {{$produit->nom}}

                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            <label for="exampleInputEmail3">Quantité</label>
                                                            <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="quantite" value="{{$sale->quantite_intrant}}">

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

                                        <div id="deleteFormModal{{$sale->id}}" class="modal fade delete-modal" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <form action="{{route('ventes.destroy', $sale->id)}}" method="POST">
                                                            {{ method_field('delete') }}
                                                               {{ csrf_field() }}
                                                           <img src="sent.png" alt="" width="50" height="46">
                                                        <h3>Confirmez vous la suppression de cet element ?</h3>
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
    </div>




@stop
