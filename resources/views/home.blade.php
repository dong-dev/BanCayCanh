@extends('layouts.app')

@section('content')
	<!-- HOME -->
    <div id="home">
        <!-- container -->
        <div class="container">
            <!-- home wrap -->
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">
                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{{ url('../img/banner1.jpg') }}" alt="">
                       
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{{ url('../img/cc3a2y1.jpg') }}" alt="">
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{{ url('img/bannergiua3.jpg') }}" alt="">
                    </div>
                    <!-- /banner -->
                </div>
                <!-- /home slick -->
            </div>
            <!-- /home wrap -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOME -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{ url('img/banner10.jpg') }}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{ url('img/banner11.jpg') }}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                    <a class="banner banner-1" href="#">
                        <img src="{{ url('img/banner12.jpg') }}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Sản Phẩm</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->
                <!-- Product Slick -->
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                        	@foreach($productDeal as $item)
	                            <!-- Product Single -->
	                            <div class="product product-single" >
	                                <div class="product-thumb">
                                        <div class="product-label">
                                            @if($item->sale != $item->price )
                                                <span class="sale">{{ round(((($item->price)-($item->sale))/($item->price))*100) }} % </span>
                                            @endif
                                            
                                        </div>
	                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i><a href="{{ route('product_detail',$item['id']) }}"> Chi tiết </a></button>
	                                    <img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="{{ $item->name }}" style="width: 200px; height: 200px;">
	                                </div>
	                                <div class="product-body">
                                        @if($item->sale!=$item->price )
                                            <h3 class="product-price">{{ number_format($item->sale)}} VND </h3>
                                            <del class="product-old-price">{{ number_format($item->price) }}</del>
                                        
                                        @else <h3 class="product-price">{{ number_format($item->price) }} VND </h3>
                                        @endif

	                                    <h2 class="product-name"><a href="{{ route('product_detail',$item['id']) }}"> {{ $item->name }}</a></h2>
                                        <div class="product-btns">
                                            {{-- <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button> --}}
                                            <a href="{{ url('cart/add/'.$item->id) }}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ </a>
                                        </div>
	                                </div>
	                            </div>
	                            <!-- /Product Single -->
							@endforeach
                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title"> Sản Phẩm mới cập nhật</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-2 custom-dots">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Slick -->
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-2" class="product-slick">
                            @foreach ($lastest as $item)
                                <!-- Product Single -->
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            @if($item->sale != $item->price )
                                                <span class="sale">{{ round(((($item->price)-($item->sale))/($item->price))*100) }} % </span>
                                            @endif
                                        </div>
                                        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i><a href="{{ route('product_detail',$item['id']) }}"> Chi tiết </a></button>
                                        <img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="" style="height: 200px; width: 200px;">
                                    </div>
                                    <div class="product-body">
                                        @if($item->sale!=$item->price )
                                            <h3 class="product-price">{{ number_format($item->sale)}} VND </h3>
                                            <del class="product-old-price">{{ number_format($item->price) }}</del>
                                        
                                        @else <h3 class="product-price">{{ number_format($item->price) }} VND </h3>
                                        @endif
                                        <h2 class="product-name"><a href="{{ url('product_detail/'.$item->id) }}">{{ $item->name }}</a></h2>
                                        <div class="product-btns">
                                            {{-- <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button> --}}
                                            <a href="{{ url('cart/add/'.$item->id) }}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Product Single -->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Sản Phẩm bạn đã xem</h2>
                    </div>
                </div>
                <!-- section title -->

                @foreach ($productViewed as $item)
                <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    @if($item->sale != $item->price )
                                        <span class="sale">{{ round(((($item->price)-($item->sale))/($item->price))*100) }} % </span>
                                    @endif
                                </div>
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i><a href="{{ route('product_detail',$item['id']) }} "> Chi tiết </a> </button>
                                <img  src="{{ asset('uploads/products/'.$item->thumbnail) }}" alt="" style="width: 200px; height: 200px;">
                            </div>
                            <div class="product-body">
                                @if($item->sale!=$item->price )
                                    <h3 class="product-price">{{ number_format($item->sale)}} VND </h3>
                                    <del class="product-old-price">{{ number_format($item->price) }}</del>
                                @else <h3 class="product-price">{{ number_format($item->price) }} VND </h3>
                                @endif
                                <h2 class="product-name"><a href="<a href="{{ route('product_detail',$item['id']) }}"> {{ $item->name }}</a> </h2>
                                <div class="product-btns">
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> <a href="{{ url('cart/add/'.$item->id) }}">Thêm vào giỏ </a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /Product Single -->
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection