
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
       @foreach($produits as $produits)
      <tr>
        <td>{{$produits->nom}}</td>
        <td>{{$produits->description}}</td>
        <td>{{$produits->prix_standard}}</td>
        <td>{{$produits->qte_reel}}</td>
        
        
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
      
      @foreach($intrants as $intrants)
      <tr>
        <td>{{$intrants->nom}}</td>
        <td>{{$intrants->unite}}</td>
        <td>{{$intrants->prix_standard}}</td>
        <td>{{$intrants->qte}}</td>
        
        
      </tr>
      @endforeach


    </tbody>
  </table>
<br>
<fieldset> <b>Employés ayant travaillés</b></fieldset>
<table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
    <thead>
      <tr>
        <th>Nom de l'employé</th>
        
      </tr>
    </thead>
    
    <tbody>
      
      @foreach($employes as $employes)
      <tr>
        <td>{{$employes->nom}}</td>
        
      </tr>
      @endforeach


    </tbody>
  </table>

  
