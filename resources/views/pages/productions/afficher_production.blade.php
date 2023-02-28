
<?php
  $produits=\Illuminate\Support\Facades\DB::table('produit_productions')
      ->join('produits','produit_productions.produit_id','=','produits.id')
      ->join('productions','produit_productions.production_id','=','productions.id')
      ->where('productions.id','=',$val)
      ->select('produit_productions.*','produits.*','productions.*')
      ->get();

  $intrants=\Illuminate\Support\Facades\DB::table('intrant_productions')
      ->join('intrants','intrant_productions.intrant_id','=','intrants.id')
      ->join('productions','intrant_productions.production_id','=','productions.id')
      ->where('productions.id','=',$val)
      ->select('intrant_productions.*','intrants.*','productions.*')
      ->get();

  $employes=\Illuminate\Support\Facades\DB::table('employe_productions')
      ->join('employes','employe_productions.employe_id','=','employes.id')
      ->join('productions','employe_productions.production_id','=','productions.id')
      ->where('productions.id','=',$val)
      ->select('employe_productions.*','employes.*','productions.*')
      ->get();

      //dd($produits);
?>
<fieldset> <b>Produits utilisés</b></fieldset>
<table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
    <thead>
      <tr>
        <th>Nom produit</th>
        <th>Description</th>
        <th>Prix standard</th>
        <th>Quantité réelle</th>

      </tr>
    </thead>

    <tbody>
       @foreach($produits as $produit)
      <tr>
        <td>{{$produit->nom}}</td>
        <td>{{$produit->description}}</td>
        <td>{{$produit->prix_standard}}</td>
        <td>{{$produit->qte_reel}}</td>


      </tr>
      @endforeach

    </tbody>
  </table>
  <br>
<fieldset><b>Intrants utilisés</b></fieldset>
  <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
    <thead>
      <tr>
        <th>Nom intrant</th>
        <th>Unité</th>
        <th>Prix standard</th>
        <th>Quantité utilisée</th>

      </tr>
    </thead>

    <tbody>

      @foreach($intrants as $intrant)
      <tr>
        <td>{{$intrant->nom}}</td>
        <td>{{$intrant->unite}}</td>
        <td>{{$intrant->prix_standard}}</td>
        <td>{{$intrant->qte}}</td>


      </tr>
      @endforeach


    </tbody>
  </table>
<br>
<fieldset> <b>Employés ayant travaillés</b></fieldset>
<table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
    <thead>
      <tr>
        <th>Nom de lemployé</th>

      </tr>
    </thead>

    <tbody>

      @foreach($employes as $employe)
      <tr>
        <td>{{$employe->nom}}</td>

      </tr>
      @endforeach


    </tbody>
  </table>


