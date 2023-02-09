@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Type dépense</h2> <br>
                    <a href="#" data-toggle="modal" data-target="#addnew"><button type="submit" class="btn btn-success mr-2">Nouveau</button></a>

                    <br><br>
                    <div> @include('layouts.notification')</div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Libelle </th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $types)
                            <tr>
                                <td>{{$types->libelle}} </td>
                                <td></td>
                                <td>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleFormModal{{$types->id}}"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor{{$types->id}}"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleFormModal{{$types->id}}" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                                         role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-simple">
                                            <form class="modal-content" action="{{route('typedepenses.update', $types->id)}}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">

                                                    <h4 class="modal-title" id="exampleFormModalLabel">Modifier les informations</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <label for="exampleInputEmail3">Libelle</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail3" name="libelle" value="{{$types->libelle}}">

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
                                <div id="delete_doctor{{$types->id}}" class="modal fade delete-modal" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <form action="{{route('typedepenses.destroy', $types->id)}}" method="POST">
                                                    {{ method_field('delete') }}
                                                    {{ csrf_field() }}
                                                    <img src="sent.png" alt="" width="50" height="46">
                                                    <h3>Voulez vous supprimer {{$types->libelle}}</h3>
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

    <div class="modal fade" id="addnew" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
         role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
            <form class="modal-content" action="{{route('typedepenses.store')}}" method="post">
                @csrf
                @method('POST')

                <div class="modal-header">

                    <h4 class="modal-title" id="exampleFormModalLabel">Ajouter un nouveau type</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="exampleInputEmail3">Libelle</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" name="libelle" >

                        <div class="col-md-12 float-right">
                            <button type="submit" class="btn btn-primary" >Submit</button>
                            <button type="reset" class="btn btn-warning" data-dismiss="modal">Reset</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>

@endsection
