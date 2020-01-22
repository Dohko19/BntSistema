<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title', 'Bennetts WMC | Inicio')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="#" />
    <!--  Social tags      -->
    {{-- <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin"> --}}
    <meta name="description" content="Bennets WMC">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Grupo Bennetts WMC | Inicio">
    <meta itemprop="description" content="Sistema de Grupo Bennetts.">
    {{-- <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg"> --}}
    <!-- Twitter Card data -->
    {{-- <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg"> --}}
    <!-- Open Graph data -->
   {{--  <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
    <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" /> --}}
    {{-- <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." /> --}}
    <meta property="og:site_name" content="Bennetts" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/google-roboto-300-700.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="blue" data-background-color="white" data-image="/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="{{ route('home') }}" class="simple-text">
                   Bennetts
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="{{ route('home') }}" class="simple-text">
                    WCM
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user text-center" style="color: white;">

                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <p>{{ auth()->user()->name }}</p>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li >
                                    <a href="{{ route('admin.users.show', auth()->user()) }}">Mi Perfil</a>
                                </li>
                                @if (auth()->user()->isAdmin())
                                <li>
                                    <a href="{{ route('admin.closters.index') }}">Administrar Centros</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ route('admin.users.edit', auth()->user()) }}">Editar mi perfil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="{{ setActiveRoute('home') }}">
                        <a href="{{ route('home') }}">
                            <i class="material-icons">home</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="{{ setActiveRoute('admin.emas.index') }}">
                        <a data-toggle="collapse" href="#areaLegal"
                       aria-expanded="true"
                        >
                            <i class="material-icons">import_contacts</i>
                            <p>Area Legal
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="{{ setActiveCollapse('admin.emas.index') }}" id="areaLegal">
                            <ul class="nav">
                                <li class="{{ setActiveRoute('admin.emas.index') }}">
                                    <a href="{{ route('admin.emas.index') }}">EMA</a>
                                </li>
                                <li class="{{ setActiveRoute('admin.ebas.index') }}">
                                    <a href="{{ route('admin.ebas.index') }}">EBA</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.suas.index') }}">SUA</a>
                                </li>
                                <li>
                                    <a href="#">Pagos Provisionales</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="{{ setActiveRoute('admin.recibosnomina.index') }}">
                        <a data-toggle="collapse" href="#rh">
                            <i class="material-icons">assignment_turned_in</i>
                            <p>Recursos Humanos
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="{{ setActiveCollapse('admin.recibosnomina.index') }}" id="rh">
                            <ul class="nav">
                                <li>
                                    <a href="#">Exp. Electronico</a>
                                </li>
                                <li class="{{ setActiveRoute('admin.recibosnomina.index') }}">
                                    <a href="{{ route('admin.recibosnomina.index') }}">Recibos de Nomina</a>
                                </li>
                                <li>
                                    <a href="#">NOM-035</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> @yield('navTitle', 'WCM Inicio') </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="{{ route('home') }}" class="dropdown-toggle">
                                    <i class="material-icons">home</i>
                                    <p class="hidden-lg hidden-md">Inicio</p>
                                </a>
                            </li>
                            @if (auth()->user()->isAdmin())
                            <li>
                                <a class="dropdown-toggle" href="{{ route('admin.closters.index') }}"><i class="material-icons">branding_watermark</i>
                                    <p class="hidden-lg hidden-md">Crear Marca</p>
                                </a>
                            </li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Mi Cuenta</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('admin.users.show', auth()->user()) }}">Mi Perfil</a>
                                    </li>
                                    @if (auth()->user()->isAdmin())
                                        <li>
                                            <a href="{{ route('admin.closters.index') }}">Administrar Centros</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.marcas.index') }}">Administrar Marcas</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">
                                    Inicio
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('js/moment.min.js') }}"></script>
<!--  Charts Plugin -->
<script src="{{ asset('js/chartist.min.js') }}"></script>
<!--  Plugin for the Wizard -->
<script src="{{ asset('js/jquery.bootstrap-wizard.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
<!--   Sharrre Library    -->
<script src="{{ asset('js/jquery.sharrre.js') }}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
<!-- Vector Map plugin -->
<script src="{{ asset('js/jquery-jvectormap.js') }}"></script>
<!-- Sliders Plugin -->
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/inputFile.js') }}"></script>
<!--  Google Maps Plugin    -->
<!--<script src="../assets/js/jquery.select-bootstrap.js"></script>-->
<!-- Select Plugin -->
<script src="{{ asset('js/jquery.select-bootstrap.js') }}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{ asset('js/jquery.datatables.js') }}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<!-- TagsInput Plugin -->
<script src="{{ asset('js/jquery.tagsinput.js') }}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('js/material-dashboard.js') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/demo.js') }}"></script>


@stack('scripts')
@unless (Route::is('admin/closters/*'))
  @include('admin.closters.create')
@endunless
@unless (Route::is('admin/marcas/*'))
  @include('admin.marcas.create')
@endunless
@unless (Route::is('admin/rh/recibosnomina/*'))
  @include('admin.recibos_nomina.create')
@endunless
<script type="text/javascript">
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
</script>
</html>