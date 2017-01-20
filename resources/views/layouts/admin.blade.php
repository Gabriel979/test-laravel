<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinema XXII</title>

         
    <link href="{{asset('../resources/views/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('../resources/views/admin/css/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('../resources/views/admin/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('../resources/views/admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    
    <?php
    link_to_asset('../resources/views/admin/css/bootstrap.min.css',$title = null, $attributes = [], $secure = null);
    link_to_asset('../resources/views/admin/css/metisMenu.min.css',$title = null, $attributes = [], $secure = null);
    link_to_asset('../resources/views/admin/css/sb-admin-2.css',$title = null, $attributes = [], $secure = null);
    link_to_asset('../resources/views/admin/css/font-awesome.min.css',$title = null, $attributes = [], $secure = null);
    ?>

</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Cinema Admin</a>
            </div>
           

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {!!Auth::user()->name!!}<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de usuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    @if(Auth::user()->id == 1)
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::to('/usuario/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('/usuario')!!}"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                        <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Película<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::to('/pelicula/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('/pelicula')!!}"><i class='fa fa-list-ol fa-fw'></i> Películas</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-child fa-fw"></i> Género<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/genero/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('genero')!!}"><i class='fa fa-list-ol fa-fw'></i> Géneros</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>

   
    <script src="{{asset('../resources/views/admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('../resources/views/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('../resources/views/admin/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('../resources/views/admin/js/sb-admin-2.js')}}"></script>

    <?php
    link_to_asset('js/jquery.min.js',$title = null, $attributes = [], $secure = null);
    link_to_asset('js/bootstrap.min.js',$title = null, $attributes = [], $secure = null);
    link_to_asset('js/metisMenu.min.js',$title = null, $attributes = [], $secure = null);
    link_to_asset('js/sb-admin-2.js',$title = null, $attributes = [], $secure = null);
    ?>

 

    @section('scripts')
    @show

</body>

</html>
