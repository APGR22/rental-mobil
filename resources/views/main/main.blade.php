<a href="{{ route('login') }}"><button>Login</button></a>
<br>
<a href="{{ route('register') }}"><button>Register</button></a>
<br>
<a href="{{ route('logout') }}"><button>Logout</button></a>

<br><br><br>

@if(Auth::user()->is_admin == 1)
    <a href="{{ route('terima') }}"><button>Terima</button></a>
@else
    <a href="{{ route('sewa') }}"><button>Sewa</button></a>
@endif