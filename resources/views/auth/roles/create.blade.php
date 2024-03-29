@extends('layouts.master')

@section('content')
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Ajouter Rôle</h2>
                        <br><br>
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

              {{--  {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}  --}}

            <form action="{{ route('roles.store') }}" method="POST">
            @csrf

              <div class="row">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nom:</label>
                    <div class="col-sm-10">
                         {{--  {!! Form::text('name', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}  --}}
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nom">

                    </div>

                </div><br><br>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Permission:</label>
                    <div class="col-sm-10">
                        <div class="row">
                            @foreach($permission as $value)
                        <div class="col-md-2">
                            <label>
                                {{--  {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}  --}}
                                <input type="checkbox" class="name" name="permission[]" value="{{ $value->id }}">
                                {{ $value->name }}
                            </label>
                        </div>
                        <br/>
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
