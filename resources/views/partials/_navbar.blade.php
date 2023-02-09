<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('home')}}">
            <img src="{{asset('assets/images/logo.svg')}}" alt="logo"/> </a>
        <a class="navbar-brand brand-logo-mini" href="{{route('home')}}">
            <img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo"/> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Gestion de fabrique</li>
        </ul>
        <form class="ml-auto search-form d-none d-md-block" action="#">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="Rechercher">
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown"
                   aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count">{{count(\App\Validation::where('reponse',null)->get())}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                     aria-labelledby="messageDropdown">
                    <a class="dropdown-item py-3" href="{{route('validations.index')}}">
                        <p class="mb-0 font-weight-medium float-left">Vous avez des validations en attente </p>
                        <span class="badge badge-pill badge-primary float-right">Tout voir</span>
                    </a>
                    @foreach(\App\Validation::where('reponse',null)->get() as $validation)
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="../assets/images/faces/user.png" alt="image" class="img-sm profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow py-2">
                                <p class="preview-subject ellipsis font-weight-medium text-dark">{{$validation->user->name}}</p>
                                <p class="font-weight-light small-text"> {{$validation->designation}} </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                   aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{asset('assets/images/faces/user.png')}}" alt="Profile image">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="{{asset('assets/images/faces/user.png')}}"
                             alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold">{{auth()->user()->name ?? ""}}</p>
                        <p class="font-weight-light text-muted mb-0"></p>
                    </div>
                    <a class="dropdown-item">Profil <span class="badge badge-pill badge-danger">1</span><i
                            class="dropdown-item-icon ti-dashboard"></i></a>
                    <a class="dropdown-item">Messages<i class="dropdown-item-icon ti-comment-alt"></i></a>
                    <a class="dropdown-item">Agenda<i class="dropdown-item-icon ti-help-alt"></i></a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                        Déconnexion
                        <i class="dropdown-item-icon ti-power-off"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
