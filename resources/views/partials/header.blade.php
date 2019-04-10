<!-- HEADER -->
<div style="display: none;" >
    <div id="message-success" >@if(Session::has('success')) {{ Session::get('success') }} @endif</div>
    <div id="message-error" >@if(Session::has('error')) {{ Session::get('error') }} @endif</div>
    <div id="message-warning" >@if(Session::has('warning')) {{ Session::get('warning') }} @endif</div>
</div>

<header>
        <!-- top Header -->
        <div id="top-header">
            <div class="container">
                <div class="pull-left">
                    <span>Welcome to TREES-shop!</span>
                </div>
                
            </div>
        </div>
        <!-- /top Header -->

        <!-- header -->
        <div id="header">
            <div class="container">
                <div class="pull-left">
                    <!-- Logo -->
                    <div class="header-logo">
                        <a class="logo" href="{{ asset('home') }}">
                            <img src="{{ url('uploads/products/tree-of-life-logo.jpg') }}" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->

                    <!-- Search -->
                    <div class="header-search">
                        {!! Form::open(['method'=> 'GET', 'url' => 'products/search']) !!}
                            {!! Form::text('keyword') !!}
                            {!! Form::submit('Search') !!}
                        {!! Form::close() !!}
                    </div>
                    <!-- /Search -->
                </div>
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
                                        <a href="{{ url('cart/list') }}" class="main-btn">Xem giỏ hàng</a>
                                        <a href="{{ url('cart/checkout') }}" class="primary-btn">Mua hàng <i class="fa fa-arrow-circle-right"></i></a>
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
            </div>
            <!-- header -->
        </div>
        <!-- container -->
    </header>
    <!-- /HEADER -->