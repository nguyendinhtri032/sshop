<!DOCTYPE html>
<html lang="en">

<head>
    @include('shop.layouts.header')
</head>

<body>
    <div>

        <div class="super_container">
            <!-- Header -->
            <header class="header trans_300">
                <!-- Top Navigation -->
                <!-- Main Navigation -->
                <div class="main_nav_container">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <div class="logo_container">
                                    <a href="#">Sport<span>shop </i> </span></a>
                                </div>
                                <nav class="navbar">
                                    <ul class="navbar_menu">
                                        <li><a href="{{route('home')}}">home</a></li>
                                        <li><a href="{{route('product')}}">product</a></li>

                                    </ul>
                                    <ul class="navbar_user">
                                        <li style="margin-right: 20px"><a href="{{route('profile')}}"><i class="fa fa-user"
                                                    aria-hidden="true"></i>{{ session()->get('username') }} </a></li>
                                        @if (session()->has('username'))
                                            @livewire('shop.logout')
                                            @livewireStyles
                                        @endif
                                        <li class="checkout" style="margin-right: 20px">
                                            <a href="{{route('cart')}}" onclick="checkCart()">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                <span id="checkout_items"
                                                    class="checkout_items">{{ Cart::getTotalQuantity() }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="hamburger_container">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        @show
        <div class="container">
            @yield('content')
        </div>
        @include('shop.layouts.footer')
    </div>
</div>
</body>

</html>
