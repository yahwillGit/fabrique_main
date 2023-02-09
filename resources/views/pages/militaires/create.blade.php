@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Nouvel employé</h2>
                    <form class="forms-sample form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Nom</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3">Prénoms</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Prénoms">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword4">Date de naissance</label>
                            <input type="date" class="form-control" id="exampleInputPassword4" placeholder="Date de naissance">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword4">Lieu de naissance</label>
                            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Lieu de naissance">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pièce d'état civil</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" placeholder="Charger un fichier">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-info" type="button">Charger</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Certificat de nationalité</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" placeholder="Charger un fichier">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-info" type="button">Charger</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword4">Sexe</label>
                            <select class="form-control" id="exampleFormControlSelect2">
                                <option>Masculin</option>
                                <option>Féminin</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword4">Situation matrimoniale</label>
                            <select class="form-control" id="exampleFormControlSelect2">
                                <option>Célibataire</option>
                                <option>Marié(e)</option>
                                <option>Divorcé(e)</option>
                                <option>Veuf(ve)</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword4">Date embauche</label>
                            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Date embauche">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword4">Type de contrat</label>
                            <select class="form-control" id="exampleFormControlSelect2">
                                <option>CDD</option>
                                <option>CDI</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword4">Salaire de base</label>
                            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Salaire">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword4">Poste occupé</label>
                            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Poste">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Valider</button>
                        <button class="btn btn-light">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
