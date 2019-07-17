<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png')}}">
	
	<!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript" src=" {{ asset('plugins/fonticon/jquery.fonticonpicker.min.js') }}"></script>
     


    <script src="{{ asset('plugins/chosen/chosen.jquery.js')}}"></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.js')}}"></script>
    <script src="{{ asset('plugins/datepicker/js/bootstrap-datepicker.js')}}"></script>
    

    <!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fonticon/css/jquery.fonticonpicker.min.css')  }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fonticon/themes/grey-theme/jquery.fonticonpicker.grey.min.css')  }}">
  <link rel="stylesheet" href="https://core2.frankjansons.nl/iconpicker/picker.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/krieg.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fonticon/fontello-7275ca86/css/fontello.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fonticon/icomoon/css/icomoon.css')}}">

    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datepicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">

</head>
<body>




    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('adminaps') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Asignar el nombre de la ruta actual -->
                         <?php 
                         $name = Route::currentRouteName();
                         ?>

                            <li><a <?php if ($name=='adminaps') {echo('class="nav-item active krieg-active"');}?>class="nav-link" href="{{ route ('adminaps') }}">{{ __('Panel') }}</a></li>
                             <li><a <?php if ($name=="adminusuarios") {echo('class="active krieg-active"');}?>class="nav-link" href="{{ route('adminusuarios') }}">{{ __('Usuarios') }}</a></li>
                            <li><a class="nav-link" href="{{ route('registrar') }}">{{ __('Registrar') }}</a></li>
                             <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>{{ Auth::user()->name }}</li>
                    </ul>
                </div>
            </div>
        </nav>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        
        <main class="py-4">
            @yield('content')
        </main>

    </div>

@yield ('js')
</body>
</html>