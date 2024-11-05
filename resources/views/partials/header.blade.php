<!-- Header / Navigation -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Store App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Products</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                    @endauth
                </ul>

                <!-- Search Form -->
                <form action="{{ route('products.index') }}" method="GET" class="form-inline my-2 my-lg-0 ml-3">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search products" aria-label="Search"
                        name="search" value="{{ request()->get('search') }}">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
