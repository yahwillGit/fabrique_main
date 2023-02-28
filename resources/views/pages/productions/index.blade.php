@section('head')



@endsection

@extends('layouts.master')

@section('content')
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouvelle production</h2>
                    <div class="panel-body container-fluid">
                <div class="panel panel-heading" id="ok">
                  @if(session()->has('ok'))
                  @include('layouts/notifications', ['type' => 'info', 'message' => session('ok')])
                  @endif
                </div>
            <form class="form-inline" name="form" id="form">

                {{csrf_field()}}

                <div class="row row-lg">

                  <div class="col-md-12">

                      <h4 class="example-title">Intrants</h4>

                  </div>
                </div>

                <table class="table " table-bordered id="dynamiq">

                  <tr>
                    <td>
                      <select class="form-control form-control-lg" name="intrant[]">
                        <option>----choisir----</option>
                        @foreach($intrants as $intrant)
                        <option value={{$intrant->id}}> {{$intrant->nom}} </option>
                        @endforeach
                      </select>
                    </td>

                    <td>
                      <input type="text" onkeypress="return valid_number(event);" class="form-control form-control-lg" id="nbre_vendu" placeholder="quantité" name="quantite[]" required="required" />
                    </td>
                    <td>
                      <button type="button" id="add" name="add" class="btn btn-primary pull-right">+</button><div class="col-lg-2">
                    </td>
                  </tr>

                </table>
                <div class="row row-lg">
                  <div class="col-md-12">

                        <h4 class="example-title">Produits</h4>

                  </div>
                </div>
                <table class="table " table-bordered id="dynamiq1">

                    <tr>
                      <td>
                        <select class="form-control form-control-lg" name="produit[]">
                          <option>----choisir----</option>
                          @foreach($produits as $produit)
                          <option value={{$produit->id}}> {{$produit->nom}} </option>
                          @endforeach

                        </select>
                      </td>

                      <td>
                        <input type="text" onkeypress="return valid_number(event);" class="form-control form-control-lg" id="nbre_vendu" placeholder="quantité" name="qte_reel[]" required="required" />
                      </td>
                      <td>
                        <button type="button" id="add1" name="add" class="btn btn-primary pull-right">+</button><div class="col-lg-2">
                      </td>
                    </tr>

                  </table>
                  <div class="row row-lg">
                  <div class="col-md-12">

                        <h4 class="example-title">Employé</h4>

                  </div>
                </div>
                <table class="table " table-bordered id="dynamiq2">

                    <tr>
                      <td>
                        <select class="form-control form-control-lg col-lg-2" name="employe[]">
                          <option>----choisir----</option>
                          @foreach($employes as $employe)
                          <option value={{$employe->id}}> {{$employe->nom}} </option>
                          @endforeach
                        </select>
                      </td>

                      <!-- <td>
                        <input type="text" onkeypress="return valid_number(event);" class="form-control form-control-lg" id="nbre_vendu" placeholder="quantité" name="nbre_vendu[]" required="required" />
                      </td> -->
                      <td>
                        <button type="button" id="add2" name="add" class="btn btn-primary pull-right">+</button><div class="col-lg-2">
                      </td>
                    </tr>

                  </table>
                  <hr noshade="noshade" size="10" width="10000">
                   <div class="row row-lg">

                      <div class="col-md-6">

                          <button type="button" id="submit" class="btn btn-large btn-success">Submit</button>

                      </div>
                      <div class="col-md-6">

                          <button type="reset" class="btn btn-light btn-block">Reset</button>

                      </div>
                  </div>


            </form>
        </div>
                </div>
            </div>
        </div>
    </div>

   </div>
  </div>

  <script type="text/javascript">

    <?php $produits=Illuminate\Support\Facades\DB::table('produits')
                ->get();

          $intrants=Illuminate\Support\Facades\DB::table('intrants')
                ->get();

          $employes=Illuminate\Support\Facades\DB::table('employes')
                ->get();

                ?>
    $(document).ready(function()
    {

      var i = 1;
      $('#add').click(function(){
        i++;
        $('#dynamiq').append('<tr id="row'+i+'"><td><select class="form-control form-control-lg" name="intrant[]"><option>----choisir----</option>@foreach($intrants as $intrants)<option value={{$intrants->id}}> {{$intrants->nom}} </option>@endforeach</select></td><td><input type="text" onkeypress="return valid_number(event);" class="form-control form-control-lg" id="nbre_vendu" placeholder="quantité" name="quantite[]" required="required" /></td><td><button type="button" id="'+i+'" name="remove" class="btn btn-danger icon glyphicon glyphicon-minus pull-right">-</button><div class="col-lg-2"></td></tr>');
      });

      $('#add1').click(function(){
        i++;
        $('#dynamiq1').append('<tr id="row'+i+'"><td><select class="form-control form-control-lg" name="produit[]"><option>----choisir----</option>@foreach($produits as $produits)<option value={{$produits->id}}> {{$produits->nom}} </option>@endforeach</select></td><td><input type="text" onkeypress="return valid_number(event);" class="form-control form-control-lg" id="nbre_vendu" placeholder="quantité" name="qte_reel[]" required="required" /></td><td><button type="button" id="'+i+'" name="remove" class="btn btn-danger icon glyphicon glyphicon-minus pull-right">-</button><div class="col-lg-2"></td></tr>');
      });

      $('#add2').click(function(){
        i++;
        $('#dynamiq2').append('<tr id="row'+i+'"><td><select class="form-control form-control-lg" name="employe[]"><option>----choisir----</option>@foreach($employes as $employes)<option value={{$employes->id}}> {{$employes->nom}} </option>@endforeach</select></td><td><button type="button" id="'+i+'" name="remove" class="btn btn-danger icon glyphicon glyphicon-minus pull-right">-</button><div class="col-lg-2"></td></tr>');
      });

      $(document).on('click','.btn-danger', function(){
        var button_id = $(this).attr("id");
        $("#row"+button_id+"").remove();
      });

      $('#submit').click(function()
      {
        $.ajax({
          url:"productions_post",
          method: "POST",
          data:$('#form').serialize(),
          success: function(data)
          {
             $('#ok').html('<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+'Opération effectuée avec succès'+'</div>')
            $('#form')[0].reset();
          }
        });
      });

    });
  </script>

@stop
