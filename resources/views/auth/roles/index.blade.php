@extends('layouts.master')

@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="form-panel">
            <div class="table-responsive-md">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Rôles </h2>
                        </div>
                        <!-- <div class="pull-right">
                            <a class="btn btn-round btn-primary" href="#">Imprimer</a>
                        </div> -->
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <a type="submit" class="btn btn-primary" href="{{ route('roles.create') }}" >Ajouter un nouveau rôle</a>
                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                    <hr>
                    <thead>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date ajout</th>
                        <th scope="col">Dernière modification</th>
                        <th width="280px">Action</th>

                    </thead>
                    @foreach ($roles as $key => $role)
                    <tbody>
                        <td class="col-md-1">{{ ++$i }}</td>
                        <td class="col-md-1"><span class="label label-success">{{ $role->name }}</span></td>
                        <td>{{ $role->created_at }}</td>
                        <td>{{ $role->updated_at }}</td>
                        <td class="">

                            <a class="dropdown-item" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye m-r-5"></i>Voir</a>
                            <a class="dropdown-item" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil m-r-5"></i> Modifier</a>

                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" href="#"><i class="fa fa-trash-o m-r-5"></i> Supprimer</button>
                            </form>
                        </td>

                    </tbody>
                    @endforeach
                </table>
                {!! $roles->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
