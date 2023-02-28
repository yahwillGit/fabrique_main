@extends('layouts.master')

@section('content')
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"><b>Détails productions</b></h2>

                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Date de produition</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="produit_id" onchange="ecran($(this).val(),'table','pages.productions.afficher_production')">
                            	<option>-----Choisissez la date concerant la production pour voir les éléments entrés en productions-------</option>
                                @foreach($productions as $production)
                                    <option value={{$production->id}}>{{$production->created_at}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="panel panel-heading">

			            </div>

			            <div id="table">

			            </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function ecran(val, idvu, fichier, param) {
            var req = $.ajax({
                url: '{{URL::to('ecran')}}',
                type: "GET",
                data: {val: val, fichier: fichier, param: param},
                dataType: "html"
            });
            req.done(function (msg) {
                $('#' + idvu).html(msg);
            });
        }
    </script>

@stop
