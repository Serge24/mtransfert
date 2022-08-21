<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MTransfert | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/base/vendor.bundle.base.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/jquery-bar-rating/fontawesome-stars-o.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/jquery-bar-rating/fontawesome-stars.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}"/>
    @yield('styles')
</head>
<body>
<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo text-white" href="{{route('admin.home')}}">
                MTransfert
            </a>
            <a class="navbar-brand brand-logo-mini text-white" href="{{route('admin.home')}}">
                M
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Rechercher" aria-label="search"
                               aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown d-flex mr-4 ">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                       id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="icon-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                         aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Menu</p>
                        <a href="{{route('admin_settings')}}" class="dropdown-item preview-item">
                            <i class="icon-cog"></i> Paramètres
                        </a>
                        <a href="{{route('request_logout')}}" class="dropdown-item preview-item">
                            <i class="icon-inbox"></i> Déconnexion
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="user-profile">
                <div class="user-image">
                    <img src="/images/users/{{userinfo(auth()->user())->avatar}}">
                </div>
                <div class="user-name">
                    {{userinfo(auth()->user())->name}}
                </div>
                <div class="user-designation">
                    {{userinfo(auth()->user())->level}}
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.home')}}">
                        <i class="icon-box menu-icon"></i>
                        <span class="menu-title">Accueil</span>
                    </a>
                </li>

                @if((userinfo(auth()->user())->level === 'Super Admin') || (auth()->user()->id == 10))
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-pot" aria-expanded="false"
                           aria-controls="ui-list-users">
                            <i class="fa fa-building menu-icon"></i>
                            <span class="menu-title">Points de transfert</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-pot">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin_transfer_points.index')}}">Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin_transfer_points.create')}}">Ajouter</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-list-users" aria-expanded="false"
                       aria-controls="ui-list-users">
                        <i class="fa fa-users menu-icon"></i>
                        <span class="menu-title">Utilisateurs</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-list-users">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin_users.index')}}">Liste</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin_users.create')}}">Ajouter</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                       aria-controls="ui-basic">
                        <i class="fa fa-newspaper-o menu-icon"></i>
                        <span class="menu-title">Transactions</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link"
                                                    href='{{route("admin_transactions.index")}}'>Liste</a></li>
                            {{--  <li class="nav-item"> <a class="nav-link" href="{{route("admin_transactions.create")}}">Ajouter</a></li>  --}}
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-price_list" aria-expanded="false"
                       aria-controls="ui-basic">
                        <i class="fa fa-newspaper-o menu-icon"></i>
                        <span class="menu-title">Grille tarifaire</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-price_list">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href='{{route("admin_pricelist.index")}}'>Liste</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{route("admin_pricelist.create")}}">Ajouter</a></li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route("admin_settings")}}">
                        <i class="icon-cog menu-icon"></i>
                        <span class="menu-title">Paramètres</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="main-panel">
            @if(session()->has('error') || session()->has('message'))
                <div class="content-wrapper"
                     style="background: #f4f7fa; width: 100%; -webkit-flex-grow: 1; flex-grow: 1;">
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                             style="margin-top:20px;">
                            <h5 class="text-danger">Attention !</h5>
                            <p>{!! session()->get('error') !!}</p>
                            <button type="button" class="btn btn-sm btn-close btn-danger" data-dismiss="alert"
                                    aria-label="Close">
                                Fermer
                            </button>
                        </div>
                        <?php Session::forget("error"); ?>
                    @elseif(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                             style="margin-top:20px;">
                            <h5 class="text-success">Félicitations !</h5>
                            <p>{!! session()->get('message') !!}</p>
                            <button type="button" class="btn btn-sm btn-close btn-success" data-dismiss="alert"
                                    aria-label="Close">
                                Fermer
                            </button>
                        </div>
                        <?php session()->forget('message'); ?>
                    @endif
                </div>
            @endif

            @yield('content')
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span
                        class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021-{{now()->format('Y')}}</span>
                    <span class="float-right float-sm-right d-block mt-1 mt-sm-0"> MTransfert | by <a
                            href="https://www.bootstrapdash.com/" target="_blank">DIGITAL-STUDIO</span>
                </div>
            </footer>
        </div>
    </div>
</div>
<script src="{{asset('vendors/base/vendor.bundle.base.js')}}"></script>
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>
<script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
@yield('scripts')
<script>
    $(document).ready(function () {
        $('table.data-table').DataTable();
        $('select.select2').select2();
    });
</script>
</body>

</html>

