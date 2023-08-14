<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{asset('assets/images/faces/user.png')}}"
                         alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{auth()->user()->name ?? ""}}</p>
                    <p class="designation">{{auth()->user()->roles[0]->name}}</p>
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Tableau de bord</span>
            </a>
        </li>
        @can('viewProduction')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
               aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Productions</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    @can('addProduction')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('productions.index')}}">Nouveau</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('productions_liste')}}">Liste</a>
                    </li>

                </ul>
            </div>
        </li>

        @endcan
        @can('viewVentes')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ventes" aria-expanded="false"
               aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Ventes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ventes">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ventes.create')}}">
                            <span class="menu-title">Vente</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ventes.index')}}">Liste</a>
                    </li>
                    @can('viewFactures')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('factures.index')}}">Factures</a>
                    </li>
                    @endcan

                </ul>
            </div>
        </li>
        @endcan

        @can('viewFournisseurs')
        <li class="nav-item">
            <a class="nav-link" href="{{route('fournisseurs.index')}}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Fournisseurs</span>
            </a>
        </li>
        @endcan
        @can('viewTypeDepense')
        <li class="nav-item">
            <a class="nav-link" href="{{route('typedepenses.index')}}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Type dépense</span>
            </a>
        </li>
        @endcan
        @can('viewTypeRecette')
        <li class="nav-item">
            <a class="nav-link" href="{{route('typerecettes.index')}}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Type recette</span>
            </a>
        </li>
        @endcan
        @can('viewDepenses')
        <li class="nav-item">
            <a class="nav-link" href="{{route('depenses.index')}}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Dépenses</span>
            </a>
        </li>
        @endcan
        @can('viewRecettes')
        <li class="nav-item">
            <a class="nav-link" href="{{route('recettes.index')}}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Recettes</span>
            </a>
        </li>
        @endcan
        @can('viewIntrants')
        <li class="nav-item">
            <a class="nav-link" href="{{route('intrants.index')}}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Intrants</span>
            </a>
        </li>
        @endcan
        @can('viewApprovisionnements')
        <li class="nav-item">
            <a class="nav-link" href="{{route('approvisionnements.index')}}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Approvisionnements</span>
            </a>
        </li>
        @endcan
        @can('viewIntrantsProduits')
        <li class="nav-item">
            <a class="nav-link" href="{{route('intrantproduits.index')}}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Intrant-Produit</span>
            </a>
        </li>
        @endcan
        @can('viewClients')
        <li class="nav-item">
            <a class="nav-link" href="{{route('clients.index')}}">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Clients</span>
            </a>
        </li>
        @endcan
        @can('viewAgents')
        <li class="nav-item">
            <a class="nav-link" href="{{route('employes.index')}}">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Agents</span>
            </a>
        </li>
        @endcan
        @can('viewProduits')
        <li class="nav-item">
            <a class="nav-link" href="{{route('produits.index')}}">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">Produits</span>
            </a>
        </li>
        @endcan
        @can('viewUsers')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false"
               aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Utilisateurs</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    @can('addUsers')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Nouveau</a>
                        </li>
                    @endcan

                   @can('viewRoles')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}">Rôles & Permissions</a>
                    </li>
                   @endcan
                    {{--  <li class="nav-item">
                        <a class="nav-link" href"#">Rôles & Permissions</a>
                    </li>  --}}
                </ul>
            </div>
        </li>
        @endcan
    </ul>
    <div class=" mt-5"></div><br>
    <div class=" mt-5"></div><br>
    <div class=" mt-5"></div><br>
    <div class=" mt-5"></div><br>
    <div class=" mt-5"></div><br>
    <div class=" mt-5"></div><br>
    <div class=" mt-5"></div><br>
    <div class=" mt-5"></div>
    <div class=" mt-5"></div>
    <div class=" mt-5"></div>
    <div class=" mt-5"></div>
    <div class=" mt-5"></div>
    <div class=" mt-5"></div>

</nav>
<!-- partial -->
