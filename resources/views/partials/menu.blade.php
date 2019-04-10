<!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">
                <!-- category nav -->
                <div class="category-nav">
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
                                                        <li><h3 class="list-links-title">{{ $it['name'] }} </h3></li>
                                                        @if($it['submenu'] != null)
                                                            @foreach ($it['submenu'] as $mIt)
                                                                <li>
                                                                    <a href="{{ route('product', $mIt['id']) }} "> {{ $mIt['name'] }} </a>
                                                                </li>
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
                        {{-- Ơ-- <li><a href="#">  </a></li>
                        <li><a href="#">Product_Details</a></li>
                        <li><a href="#">Sales</a></li>
                        <li><a href="#">About ú</a></li> --}} 
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->
