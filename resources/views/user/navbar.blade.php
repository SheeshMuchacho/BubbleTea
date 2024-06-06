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
                    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('about') }}">About Us</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                    </li>

                    @if (Route::has('login'))
                        @auth

                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="cartDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-regular fa-cart-shopping" style="color: #fb5b5b;"></i> Cart @if(isset($count)) ({{ $count }}) @endif
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="cartDropdown" style="width: 250px;">
                                        @if(isset($carts) && !$carts->isEmpty())
                                            <form action="{{ route('stripe') }}" method="POST">
                                                @csrf
                                                @foreach($carts as $cart)
                                                    <li class="p-3">
                                                        <div class="flex flex-col items-center">
                                                            <div class="flex justify-between w-full text-base font-medium text-gray-900">
                                                                <h3 class="flex-1">
                                                                    <input type="hidden" name="productname[]" value="{{ $cart->product_title }}">
                                                                    <p class="truncate">{{ $cart->product_title }}</p>
                                                                </h3>
                                                                <input type="hidden" name="quantity[]" value="{{ $cart->quantity }}">
                                                                <p class="ml-4">{{ $cart->quantity }}</p>
                                                            </div>
                                                            <div class="flex justify-between w-full text-sm mt-2">
                                                                <input type="hidden" name="price[]" value="{{ $cart->price }}">
                                                                <p class="text-gray-500">LKR {{ $cart->price }}</p>
                                                                <a class="font-medium text-red-500 cursor-pointer hover:shadow-md transition-shadow duration-300" href="{{ url('delete', $cart->id) }}">
                                                                    Remove
                                                                </a>
                                                            </div>
                                                            <div class="border-t border-gray-200 mt-2 w-full"></div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                <button class="bg-red-500 text-white hover:bg-red-600 w-full py-3">
                                                    Proceed to Checkout
                                                </button>
                                            </form>
                                        @else
                                            <p class="text-center text-gray-500 m-2">There is nothing in the cart. <i class="fa fa-regular fa-cart-arrow-down"></i></p>
                                        @endif
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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('message') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('error') }}
        </div>
    @endif
</header>
