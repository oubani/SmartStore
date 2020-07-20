<div class="pt-1 pb-1" style="background: #cbcbcc" >
<div class="container d-flex justify-content-between">
    <div style="color: black" >
        <i class="fas fa-envelope-open mr-2"> </i> Contact@smartstore.com
    </div>
    <div  >
        <a href="/fr"><img src="/images/Fr.png" width="20px" alt="Fr"></a>
        <a href="/en"><img src="/images/Uk.png" width="20px" alt="En"></a>
    </div>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <style>
        .navbar-light .navbar-nav .nav-link {
            color: black;
        }
        .counter{
            z-index: 1;
            float: right;
            top: 10px;
            background: #3DC4FE;
            overflow: auto;
        }
    </style>
    <div class="container">
    <a class="navbar-brand" href="/"> <img src="/images/logo.jpeg" height="60px"  alt="" srcset=""> </a>

    {{--  right part Navbar --}}

    <ul class="nav navbar-nav navbar-right navbar-dark " >
        <li class="nav-item"><a class="nav-link" href="/products">{{__('messages.products')}}  </a> </li>

        <li class="nav-item mr-3"><a class="nav-link" href="/cart"> <div><i class="fas fa-shopping-cart fa-2x"></i> @if (Cart::count()>0)
            <div class="badge text-white counter "  >{{Cart::count()}}</div>
        @endif </div></a> </li>
        @if (Auth::guest())
            <li class="nav-item"><a class="nav-link btn btn-success rounded text-white " href="{{route('login')}}" > {{__('messages.connect')}} </a> </li>
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/home" > {{__('messages.dashboard')}} </a>
                <a class="dropdown-item" href="/myorders" > {{__('messages.myOrders')}} </a>
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
