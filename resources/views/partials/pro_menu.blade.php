<!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">
                <!-- category nav -->
                <div class="category-nav show-on-click">
                    <span class="category-header">Categories <i class="fa fa-list"></i></span>
                    <ul class="category-list">
                        @foreach (Menu::getMenu() as $item)
                            <li @if($item['submenu'] != null) class="dropdown side-dropdown" @endif>
                				<a @if($item['submenu'] != null) class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" @endif >
                					{{ $item['name'] }} 
                					@if($item['submenu'] != null)
                						<i class="fa fa-angle-right"></i>
                					@endif
                				</a>
                                @if($item['submenu'] != null)
                                    <div class="custom-menu">
                                        <div class="row">
                                            @foreach ($item['submenu'] as $it)
                                                <div class="col-md-4">
                                                    <ul class="list-links">
                                                        <li><h3 class="list-links-title">{{ $it['name'] }}</h3></li>
                                                        @if($it['submenu'] != null)
                                                            @foreach ($it['submenu'] as $mIt)
                                                                <li>{{ $mIt['name'] }}</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                    <hr class="hidden-md hidden-lg">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row hidden-sm hidden-xs">
                                            <div class="col-md-12">
                                                <hr>
                                                <a class="banner banner-1" href="#">
                                                    <img src="{{ url('img/banner05.jpg') }}" alt="">
                                                    <div class="banner-caption text-center">
                                                        <h2 class="white-color">NEW COLLECTION</h2>
                                                        <h3 class="white-color font-weak">HOT DEAL</h3>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                        {{-- <li><a href="#">View All</a></li> --}}
                    </ul>
                </div>
                <!-- /category nav -->

                <!-- menu nav -->
                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="{{ asset('home') }}">Trang chủ</a></li>
                        {{-- <li><a href="#">Product</a></li>
                        <li><a href="#">Product_Details</a></li>
                        <li><a href="#">Sales</a></li>
                        <li><a href="#">About us</a></li> --}}
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->
