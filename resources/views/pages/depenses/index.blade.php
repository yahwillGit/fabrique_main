@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liste des recettes</h2> <br>
                    <a href="#" data-toggle="modal" data-target="#addnew">
                        <button type="submit" class="btn btn-success mr-2">Nouveau</button>
                    </a>
                    <div class="modal fade" id="addnew" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                         role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-simple">
                            <form class="modal-content" action="{{route('depenses.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <div class="modal-header">

                                    <h4 class="modal-title" id="exampleFormModalLabel">Ajouter une dépense</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="exampleInputEmail3">Libelle</label>
                                            <input type="text" class="form-control" id="exampleInputEmail3"
                                                   name="libelle">
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="exampleInputName1">Type dépense</label>
                                            <select class="form-control" id="exampleFormControlSelect2"
                                                    name="typedepense_id">
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->libelle}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="exampleInputEmail3">Montant</label>
                                            <input type="number" min="0" class="form-control" id="exampleInputEmail3"
                                                   name="montant">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>Copie de facture</label>
                                            <input type="file" class="form-control"
                                                   name="fichier">
                                        </div>
                                        <div class="form-group col-12">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            <button type="reset" class="btn btn-warning" data-dismiss="modal">Annuler
                                            </button>
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
                            <th> Libelle</th>
                            <th> Date</th>
                            <th> Montant</th>
                            <th> Type dépense</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($depenses as $depense)
                            <tr>
                                <td class="{{$depense->valide == 1 ? "text-success" : "text-default" }}">{{$depense->libelle}} </td>
                                <td> {{$depense->date}}</td>
                                <td> {{$depense->montant}} </td>
                                <td> {{$depense->typedepense->libelle ?? ""}}</td>
                                <td>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @if($depense->fichier != null || $depense->fichier != "")
                                            <a class="dropdown-item" target="_blank" href="{{'http://localhost:8888/fabrique/'. $depense->fichier}}"><i
                                                    class="fa fa-pencil m-r-5"></i> Voir le justificatif</a>
                                            @endif
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                               data-target="#update_doctor{{$depense->id}}"><i
                                                    class="fa fa-pencil m-r-5"></i> Modifier</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                               data-target="#delete_doctor{{$depense->id}}"><i
                                                    class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="update_doctor{{$depense->id}}" aria-hidden="false"
                                         aria-labelledby="exampleFormModalLabel"
                                         role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-simple">
                                            <form class="modal-content"
                                                  action="{{route('depenses.update',$depense->id)}}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">

                                                    <h4 class="modal-title" id="exampleFormModalLabel">Modifier une
                                                        dépense</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <label for="exampleInputEmail3">Libelle</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail3"
                                                               name="libelle" value="{{$depense->libelle}}">

                                                        <label for="exampleInputEmail3">Libelle</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail3"
                                                               name="libelle" value="{{$depense->libelle}}">

                                                        <label for="exampleInputEmail3">Montant</label>
                                                        <input type="number" min="0" class="form-control"
                                                               id="exampleInputEmail3" name="montant"
                                                               value="{{$depense->montant}}">

                                                        <div class="col-md-12 float-right">
                                                            <button type="submit" class="btn btn-primary">Valider
                                                            </button>
                                                            <button type="reset" class="btn btn-warning"
                                                                    data-dismiss="modal">Annuler
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </td>

                                <div id="delete_doctor{{$depense->id}}" class="modal fade delete-modal" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <form action="{{route('depenses.destroy', $depense->id)}}"
                                                      method="POST">
                                                    {{ method_field('delete') }}
                                                    {{ csrf_field() }}
                                                    <img src="sent.png" alt="" width="50" height="46">
                                                    <h3>Voulez vous supprimer cette dépense?</h3>
                                                    <div class="m-t-20"><a href="#" class="btn btn-white"
                                                                           data-dismiss="modal">Close</a>
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
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
