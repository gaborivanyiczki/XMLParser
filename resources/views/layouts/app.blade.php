<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

     <!-- Scripts -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.uikit.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


    <!-- Export -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/css/uikit.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.uikit.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dist/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flag-icon.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app" style="height: 1000px;">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-weight: bold;">
                    PPR XML Parser
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                       @if(!Auth::guest() && Entrust::hasRole('admin'))
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Admin <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('settings.users') }}">Users</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Types</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Attributes</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Assign role</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <h4 class="dropdown-header">File manager</h4>
                                    <a class="dropdown-item" href="{{ route('home') }}">Upload xml</a>
                                    <a class="dropdown-item" href="{{ route('file.index') }}">Files list</a>
                                    <a class="dropdown-item" href="{{ route('file.index') }}">Archives</a>
                                    <div class="dropdown-divider"></div>
                                    <h4 class="dropdown-header">XML Actions</h4>
                                    <a class="dropdown-item btn-client" href="{{ route('home') }}">Clients</a>
                                    <a class="dropdown-item btn-ch" href="{{ route('newcardholder.index') }}" >Cardholder</a>
                                    <a class="dropdown-item btn-ci" href="{{ route('home') }}">Card Issue</a>
                                    <a class="dropdown-item btn-cr" href="{{ route('home') }}" >Card Reissue</a>
                                    <a class="dropdown-item btn-aci" href="{{ route('home') }}">Additional Card Issue</a>
                                    <a class="dropdown-item btn-ac" href="{{ route('home') }}">Activate Card</a>
                                    <div class="dropdown-divider"></div>
                                    <h4 class="dropdown-header">Settings</h4>
                                    <a class="dropdown-item" href="{{ route('settings.users') }}">Users list</a>
                                    <a class="dropdown-item" href="{{ route('settings.users') }}">Account settings</a>
                                    <div class="dropdown-divider"></div>
                                    <h4 class="dropdown-header">Actions</h4>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @elseif(!Auth::guest())
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Admin <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <h4 class="dropdown-header">No permission</h4>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <h4 class="dropdown-header">File manager</h4>
                                    <a class="dropdown-item" href="{{ route('home') }}">Upload xml</a>
                                    <a class="dropdown-item" href="{{ route('file.index') }}">Files list</a>
                                    <a class="dropdown-item" href="{{ route('file.index') }}">Archives</a>
                                    <div class="dropdown-divider"></div>
                                    <h4 class="dropdown-header">XML Actions</h4>
                                    <a class="dropdown-item btn-client" href="{{ route('home') }}">Clients</a>
                                    <a class="dropdown-item btn-ch" href="{{ route('newcardholder.index') }}" >Cardholder</a>
                                    <a class="dropdown-item btn-ci" href="{{ route('home') }}">Card Issue</a>
                                    <a class="dropdown-item btn-cr" href="{{ route('home') }}" >Card Reissue</a>
                                    <a class="dropdown-item btn-aci" href="{{ route('home') }}">Additional Card Issue</a>
                                    <a class="dropdown-item btn-ac" href="{{ route('home') }}">Activate Card</a>
                                    <div class="dropdown-divider"></div>
                                    <h4 class="dropdown-header">Settings</h4>
                                    <a class="dropdown-item" href="{{ route('settings.users') }}">Users list</a>
                                    <a class="dropdown-item" href="{{ route('settings.users') }}">Account settings</a>
                                    <div class="dropdown-divider"></div>
                                    <h4 class="dropdown-header">Actions</h4>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                            </li>
                           @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container" style="margin-top: 50px; background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4"></div> <!-- this column empty -->
                            <div class="col-md-4"><a href="{{ route('home.session',1) }}"><span class="flag-icon flag-icon-de"></span></a></div>
                            <div class="col-md-4"><a href="{{ route('home.session',2) }}"><span class="flag-icon flag-icon-cz"></span></a></div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2"><a href="{{ route('home.session',3) }}"><span class="flag-icon flag-icon-at"></span></a></div>
                            <div class="col-md-2"><a href="{{ route('home.session',4) }}"><span class="flag-icon flag-icon-pl"></span></a></div>
                            <div class="col-md-2"><a href="{{ route('home.session',5) }}"><span class="flag-icon flag-icon-sk"></span></a></div>
                            <div class="col-md-2"><a href="{{ route('home.session',6) }}"><span class="flag-icon flag-icon-ro"></span></a></div>
                            <div class="col-md-2"><a href="{{ route('home.session',7) }}"><span class="flag-icon flag-icon-hu"></span></a></div>
                            <div class="col-md-2"></div> <!-- this column empty -->
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
            @yield('scripts')
        </main>
    </div>
</body>
</html>
