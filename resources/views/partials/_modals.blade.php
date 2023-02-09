<div class="row">
    <div class="col-md-4">

        <div class="modal fade" id="modal-clients" tabindex="-1" role="dialog" aria-labelledby="modal-form"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">

                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Clients</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <button class="btn btn-sm btn-primary" data-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <hr class="my-4" />
                            <form method="post" action="{{route('etats.clients')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="from_date">Date début</label>
                                            <input type="date" class="form-control" name="from_date" id="from_date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="to_date">Date fin</label>
                                            <input type="date" class="form-control" name="to_date" id="to_date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Trier par</label>
                                            <select class="form-control" name="sort_by">
                                                <option value="DESC">Plus récent</option>
                                                <option value="ASC">Plus ancien</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-lg-4 text-right">
                                    <button class="btn btn-3 btn-primary" type="submit">
                                        <span class="btn-inner--text">Valider</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">

        <div class="modal fade" id="modal-commandes" tabindex="-1" role="dialog" aria-labelledby="modal-form"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">

                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Commandes</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <button class="btn btn-sm btn-primary" data-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <hr class="my-4" />
                            <form method="post" action="{{route('etats.commandes')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="from_date">Date début</label>
                                            <input type="date" class="form-control" name="from_date" id="from_date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="to_date">Date fin</label>
                                            <input type="date" class="form-control" name="to_date" id="to_date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Trier par</label>
                                            <select class="form-control" name="sort_by">
                                                <option value="DESC">Plus récent</option>
                                                <option value="ASC">Plus ancien</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-lg-4 text-right">
                                    <button class="btn btn-3 btn-primary" type="submit">
                                        <span class="btn-inner--text">Valider</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


