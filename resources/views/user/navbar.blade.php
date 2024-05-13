<!-- Header -->

<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand" href="#"><h2>Bubble Me <em>Bubble Tea</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('ourproduct') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('ourproduct') }}">Our Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="cartDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-regular fa-cart-shopping" style="color: #fb5b5b;"></i> Cart [{{ $count }}]
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="cartDropdown">
                                            @foreach($carts as $cart)
                                            <li>{{ $cart->product_title }} - Quantity: {{ $cart->quantity }} Price: {{ $cart->price }}</li>
                                            @endforeach
                                    </ul>
                                </div>
                            </li>
                            <x-app-layout></x-app-layout>
                        @else
                            <li><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                            @if (Route::has('register'))
                                <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('message') }}
        </div>
    @endif
</header>
