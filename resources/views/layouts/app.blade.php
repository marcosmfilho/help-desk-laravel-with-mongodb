@guest
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

@else

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Help Desk | System</title>

    <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ URL::asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ URL::asset('js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    <link href="{{ URL::asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet">

    <link href="{{ URL::asset('css/plugins/footable/footable.core.css')}}" rel="stylesheet">

    <link href="{{ URL::asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" width="50" class="img-circle" src="{{ URL::asset('img/user.png')}}" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">{{ Auth::user()->email }}</span> </span> </a>
                        </div>
                        <div class="logo-element">
                            HD+
                        </div>
                    </li>
                    <li class="{{ $active == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
                    </li>
                    <li class="{{ $active == 'users' ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span class="nav-label">Usuários</span></a>
                    </li>
                    <li  class="{{ $active == 'occurrences' ? 'active' : '' }}" >
                        <a href="{{ route('occurrences.index') }}"><i class="fa fa-bell"></i> <span class="nav-label">Ocorrências</span></a>
                    </li>
                    <li class="{{ $active == 'my_occurrences' ? 'active' : '' }}"> 
                        <a href="{{ route('myOccurrences') }}"><i class="fa fa-bell"></i> <span class="nav-label">Minhas ocorrências</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">

                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>

        </nav>
        </div>

			<div class="row">
				<div class="col-lg-12">
					<div class="wrapper wrapper-content">
						@yield('content')
					</div>
				</div>
			</div>

        </div>

    </div>

    <!-- Mainly scripts -->
    <script src="{{ URL::asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{ URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>

    <script src="{{ URL::asset('js/plugins/footable/footable.all.min.js')}}"></script>
    <script src="{{ URL::asset('js/plugins/dataTables/datatables.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ URL::asset('js/inspinia.js')}}"></script>
    <script src="{{ URL::asset('js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{ URL::asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    
    <!-- Toastr -->
    <script src="{{ URL::asset('js/plugins/toastr/toastr.min.js')}}"></script>



    <script>
        $(document).ready(function() {
            
            /*setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

            }, 1300); */

        });
    </script>
</body>
</html>
@endguest
