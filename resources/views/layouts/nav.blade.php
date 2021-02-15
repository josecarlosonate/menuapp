{{-- <nav class="navbar  " role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">MenuMovil</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('login') }}">
                            <img src="{{ asset('layout/img/inicio.png') }}" alt=""></a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('register') }}">
                                <img src="{{ asset('layout/img/registro.png') }}" alt=""></a>
                        </li>
                    @endif
                @else
                @endguest
            </ul>
        </div>
    </div>
</nav> --}}

<nav class="navbar navbar-expand-sm navbar-dark fondoNavar">
    <!-- Brand -->
    <a class="navbar-brand" href="/">
        <img src="{{asset('layout/img/logo.png')}}" alt="Logo" style="width:200px;">
    </a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">INGRESAR</a>
            </li>
            {{-- <li class="nav-item"> --}}
                {{-- <a class="nav-link" href="#">Registrar</a> --}}
            {{-- </li> --}}
            
        </ul>
    </div>
    
</nav>
