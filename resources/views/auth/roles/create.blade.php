@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Paramétrer rôle</h2>
                    <form class="forms-sample form-row" method="POST" action="{{route('role.update')}}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value="{{$role->id}}">
                        <div class="form-group col-md-6">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="nom" value="{{$role->name}}">
                        </div>

                        <h4>Assigner une permission</h4>
                        @foreach (\Spatie\Permission\Models\Permission::all() as $permission)
                            <div class="form-control">
                                <label>
                                    <input name="permissions[]" type="checkbox" value="{{ $permission->id }}" {{ $role->permissions->containsStrict("name", $permission->name) ? "checked" : null }} />
                                    <span class="cr"><i class="cr-icon fa fa-check txt-success"></i></span>
                                    <span>{{ $permission->name }}</span>
                                </label>
                            </div>
                        @endforeach

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-success mr-2">Valider</button>
                            <button class="btn btn-light">Annuler</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
