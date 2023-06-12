@extends('layouts.master')

@section('content')
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"><b>Détails productions</b></h2>

                        {{--  <div class="form-group col-md-6">
                            <label for="exampleInputName1">Date de produition</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="produit_id" onchange="ecran($(this).val(),'table','pages.productions.afficher_production')">
                            	<option>-----Choisissez la date concerant la production pour voir les éléments entrés en productions-------</option>
                                @foreach($productions as $production)
                                    <option value={{$production->id}}>{{$production}}</option>
                                @endforeach
                            </select>
                        </div>  --}}

                        <div class="panel panel-heading">

			            </div>

			            <div id="table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Date production </th>
                                        <th> Produit </th>
                                        <th> Quatité </th>
                                        <th> Quantité réel </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productions as $production)
                                    <!-- {{$production}} <br> <br> -->
                                    <tr>
                                        <td>{{ $production->date_production }}</td>
                                        <td>{{ $production->produitProduction[0]->Produit->nom }}</td>
                                        <td>{{ $production->produitProduction[0]->Produit->description }}</td>
                                        <td>{{ $production->intrantProduction[0]->qte }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
