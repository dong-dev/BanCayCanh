@extends('layouts.pro')

@section('content')
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img  src="{{ asset('uploads/products/'.$product->thumbnail) }}" alt="" style="width: 400px; height: 400px; ">
							</div>
							{{-- <div class="product-view">
								<img src="./img/main-product02.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="./img/main-product03.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="./img/main-product04.jpg" alt="">
							</div> --}}
						</div>
						{{--  <!-- <div id="product-view">
							<div class="product-view">
								<img src="./img/thumb-product01.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="./img/thumb-product02.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="./img/thumb-product03.jpg" alt="">
							</div>
							<div class="product-view">
								<img src="./img/thumb-product04.jpg" alt="">
							</div>
						</div> -->  --}}

						
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<h2 class="product-name"> {{ $product['name'] }}</h2>
							<h3 class="product-price" style="color: red;"> {{ number_format($product['sale'])}} VND </h3>
							<del class="product-old-price">{{ number_format($product['price'])}} VND </del> 
							<div class="product-label"> 
								@if($product['price'] != $product['sale'] )
									<span class="sale">- {{ round(((($product['price'])-($product['sale']))/($product['price']))*100) }} %
									</span>
								@endif
								 
							</div>
							
<br><br><br><br>
					
							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">QTY: </span>
									{{-- <input class="input" type="number" value="1" min="1"> --}}

									{{ Form::open(['method' => 'POST', 'url' => 'cart/update']) }}
										<input type="hidden" name="row_id" value="{{  $product->row_id }}" />
										<input class="input" type="number" min="1" max="10" name="qty" value="{{ $product->qty }}" />
										{{ Form::submit('Update') }}
									{{ Form::close() }}
								</div>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> <a href="{{ url('cart/add/'.$product->id) }}"> Thêm vào giỏ</a></button>
						
							</div>
						</div>
					
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li><a data-toggle="tab" href="#tab1">Mô tả</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<strong> {!! $product['name'] !!}</strong>
									<p> {!! $product['description'] !!}</p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	
	
@endsection