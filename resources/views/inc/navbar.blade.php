<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <style>
        .navbar-light .navbar-nav .nav-link {
            color: black;
        }
    </style>
    <div class="container">
    <a class="navbar-brand" href="/">SmartStore</a>

    {{--  right part Navbar --}}

    <ul class="nav navbar-nav navbar-right navbar-dark " >
        <li class="nav-item"><a class="nav-link" href="/cart">cart <b>({{Cart::count()<1?' ':Cart::count()}})</b> </a> </li>
        @if (Auth::guest())
            <li class="nav-item"><a class="nav-link btn btn-success rounded text-white " href="{{route('login')}}" >Se connecter</a> </li>
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/home" > Dashboard </a>
                <a class="dropdown-item" href="/home" > Favorite </a>
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
        @endif
    </ul>
</div>
  </nav>
