<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CupidNot') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'CupidNot') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i class="fa fa-instagram"></i> Instagram</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>

                       {{--

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                            @endguest

                        --}} 

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<script src="{{ asset('assets/jquery.min.js') }}"></script>	
<script src="{{ asset('assets/bootstrap.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 6000000,
      values: [ 0, 600000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val(ui.values[ 0 ] + "-" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
      "-" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
</script>


<script>
	$( function() {
	  var d = new Date();
	  var year = d.getFullYear() - 21;
	   d.setFullYear(year);
	 $(".date").datepicker({
		   changeMonth: true,
		   changeYear: true,
		   dateFormat: 'dd-mm-yy',
		   yearRange: '-50:-18',
		   defaultDate: d,
	   onSelect: function(dateText,ui) {
		$(this).change();
		var today = new Date();
		age = today.getFullYear() - ui.selectedYear;
		$('#ageuser').val(age);
	   }
	 }).on("change", function() {

	 });


	 });
</script>
	
	
	
</body>

</html>
