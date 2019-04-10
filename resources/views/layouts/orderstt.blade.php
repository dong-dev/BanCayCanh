<!DOCTYPE html>
<html lang="en">
<head>
   
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />


    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ url('css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ url('css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ url('css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ url('css/checkstatus.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ url('css/style1.css') }}" />
</head>

<body>
    <div class="pull-right">
        <ul class="header-btns">
            <!-- Account -->
            <li class="header-account dropdown default-dropdown">
                <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                    <div class="header-btns-icon">
                        <i class="fa fa-user-o"></i>
                    </div>
                    @if(!Auth::guest())
                        <strong class="text-uppercase"> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i></strong>
                    @endif
                </div>
                <ul class="custom-menu">
                @if(!Auth::guest())
                    <li><a href="#"><i class="fa fa-user-o"></i>{{ Auth::user()->name }} </a></li>

                    <li><a href="{{url('logout')}}"><i class="fa fa-check"></i> ĐĂNG XUẤT</a></li>
                @else
                    
                    <li><a href="{{ asset('/register') }}"><i class="fa fa-user-plus"></i> Tạo tài khoản </a></li>
                    <li><a href="{{ asset('/login') }}"><i class="fa fa-unlock-alt"></i> Đăng nhập </a></li>
                @endif
                </ul>
            </li>
            <!-- /Account -->

            <!-- Cart -->
            <li class="header-cart dropdown default-dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <div class="header-btns-icon">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="qty">{{ Cart::count() }}</span>
                    </div>
                    <strong class="text-uppercase">Giỏ hàng</strong>
                    
            
                </a>
                <div class="custom-menu">
                    <div id="shopping-cart">
                        <div class="shopping-cart-list">
                            @foreach (Cart::content() as $item)
                                <div class="product product-widget">
                                    <div class="product-thumb">
                                        <img src="{{ url('uploads/products/'.$item->options['thumbnail']) }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">{{ $item->price }}<span class="qty">x{{ $item->qty }}</span></h3>
                                        <h2 class="product-name">
                                            <a href="{{ url('product_detail/'.$item->id) }}">{{ $item->name }}</a>
                                        </h2>
                                    </div>
                                    <a href="{{ url('cart/remove/'.$item->id) }}" class="cancel-btn"><i class="fa fa-trash"></i></a>
                                </div>
                            @endforeach
                        </div>
                        <div class="shopping-cart-btns">
                            <a href="{{ url('cart/list') }}" class="main-btn">View Cart</a>
                            <a href="{{ url('cart/checkout') }}" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- /Cart -->

            <!-- Mobile nav toggle-->
            <li class="nav-toggle">
                <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
            </li>
            <!-- / Mobile nav toggle -->
        </ul>
    </div>

         @yield('content')
    @include('partials.footer')

    <!-- jQuery Plugins -->
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/slick.min.js') }}"></script>
    <script src="{{ url('js/nouislider.min.js') }}"></script>
    <script src="{{ url('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>
</body>
</html>