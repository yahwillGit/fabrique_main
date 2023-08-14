@extends('layouts.master')

@section('content')
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Rôles attribués</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}">Retour</a>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permissions:</strong><br><br>
                        @if(!empty($rolePermissions))
                        <div class="row">
                            @foreach($rolePermissions as $v)
                                <div class="col-md-2">
                                    <label class="label label-success">{{ $v->name }}</label>

                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
