@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liste des intrants Produits</h2> <br>
                    <a href="{{route('intrantproduits.create')}}"><button type="submit" class="btn btn-success mr-2">Nouveau</button></a>
                    <br><br>
                    <div> @include('layouts.notification')</div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Intrant </th>
                            <th> Produit </th>
                            <th> Quantité Intrant </th>
                            <th> Quantité Produit </th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($intrantproduits as $intrantproduit)
                        <tr>
                            <td>{{$intrantproduit->nom_intrant}} </td>
                            <td> {{$intrantproduit->nom_prod}}</td>
                            <td> {{$intrantproduit->quantite_intrant}} </td>
                            <td> {{$intrantproduit->quantite_produit}}</td>
                            <td>
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleFormModal{{$intrantproduit->id}}"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor{{$intrantproduit->id}}"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleFormModal{{$intrantproduit->id}}" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                                    role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-simple">
                                    <form class="modal-content" action="{{route('intrantproduits.update', $intrantproduit->id)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">

                                        <h4 class="modal-title" id="exampleFormModalLabel">Modifier les informations du intrantproduits</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <label for="exampleInputEmail3">Intrant</label>
                                                <!-- <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="intrant_id" value="{{$intrantproduit->intrant_id}}"> -->
                                                <select class="form-control" id="exampleFormControlSelect2" name="intrant_id">
                                                   @foreach($intrants as $intrant)
                                                        <option @if ($intrant->id==$intrantproduit->intrant_id) selected @endif value = '{{$intrant->id}}' >
                                                            {{$intrant->nom}}

                                                        </option>
                                                    @endforeach
                                                </select>

                                                <label for="exampleInputName1">Fournisseur</label>
                                                <select class="form-control" id="exampleFormControlSelect2" name="produit_id">
                                                   @foreach($produits as $produit)
                                                        <option @if ($produit->id==$intrantproduit->produit_id) selected @endif value = '{{$produit->id}}' >
                                                            {{$produit->nom}}

                                                        </option>
                                                    @endforeach
                                                </select>

                                               <!--  <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="produit_id" value="{{$intrantproduit->produit_id}}"> -->
                                                <label for="exampleInputEmail3">Quantité intrant</label>
                                                <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="quantite_intrant" value="{{$intrantproduit->quantite_intrant}}">
                                                <label for="exampleInputEmail3">Quantité produit</label>
                                                <input type="tel" class="form-control" min="0" id="exampleInputEmail3" name="quantite_produit" value="{{$intrantproduit->quantite_produit}}">

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

                            <div id="delete_doctor{{$intrantproduit->id}}" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <form action="{{route('intrantproduits.destroy', $intrantproduit->id)}}" method="POST">
                                            {{ method_field('delete') }}
                                               {{ csrf_field() }}
                                           <img src="sent.png" alt="" width="50" height="46">
                                        <h3>Confirmez vous la suppression de cet element ?/h3>
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
