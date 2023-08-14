@extends('layouts.master')

@section('content')
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Modifier Rôle</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}">Retour</a>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong>Il y a eu quelques soucis.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{--  {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}  --}}
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Name:</label>
                    <div class="col-sm-10">
                        {{--  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}  --}}
                        <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" placeholder="Nom">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Permission:</label>
                    <div class="col-sm-10">
                        <div class="row">
                            @foreach($permission as $value)
                        <div class="col-md-2">
                            <label>
                                {{--  {{ Form::checkbox('permission[]', $value->id,
                                in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}  --}}
                                <input type="checkbox" class="name" name="permission[]" value="{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? "checked" : "" }}>
                                {{ $value->name }}

                            </label>
                        </div>
                        <br />
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
{{--  {!! Form::close() !!}  --}}

@endsection
