<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="index.html">
            <h1 class="tm-site-title mb-0">Product Admin</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                @if (Auth::guard('master')->check())
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admins.dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="{{route('admins.show_category')}}" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-file-alt"></i>

                        <span>
                            category <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <div  aria-labelledby="navbarDropdown">
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admins.show_category') }}">add category</a></li>
                        </ul>
                    </div>


                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admins.show_add_product') }}">
                        <i class="fas fa-shopping-cart"></i>
                        Products
                    </a>
                </li>
                @endif

                @if (!Auth::guard('master')->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admins.cust_register')}}">
                        <i class="far fa-user"></i>
                        Register
                    </a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        <span>
                            Settings <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Billing</a>
                        <a class="dropdown-item" href="#">Customize</a>
                    </div>
                </li>
                @endif

                @if (!Auth::guard('master')->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admins.cust_login')}}">
                        <i class="far fa-user"></i>
                        Login
                    </a>
                </li>
                @else
                <li class="nav-item d-flex align-items-center">
                    <form action="{{route('admins.logout')}}" method="POST">
                        @csrf
                        @method('POST')
                        {{-- <button type="submit">Logout</button> --}}
                        <button type="submit" class=" btn btn-danger nav-link d-block">
                            Admin, <b>Logout</b>
                        </button>
                    </form>
                </li>
                @endif

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admins.profile',auth()->guard('master')->id())}}">
                        <i class="far fa-user"></i>
                        Profile
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>

</nav>
