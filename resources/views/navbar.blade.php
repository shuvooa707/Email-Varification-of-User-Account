
<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
    <a class="navbar-brand" href="/">Home</a>

    @if ( !auth()->check() )
        <span>
            <a href="{{ route('login') }}" class="btn btn-info">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
        </span>
    @else
        <span>
            @if ( auth()->user()->role == 1 )
            <a href="{{ route('dashboard') }}" class="btn btn-warning">Dashboard</a>
            @endif
            <a href="{{ route('logout') }}" class="btn btn-danger">Login Out</a>
        </span>
    @endif
</nav>
