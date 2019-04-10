@extends('layouts.pro')

@section('content')
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				
				<!-- /ASIDE -->

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						@if(Request::has('keyword'))
							<h2>Ket qua tim kiem: "{{ Request::get('keyword') }}"</h2>
						@endif
						<div class="row">
							<!-- Product Single -->
							@foreach($pro as $item)
								<div class="col-md-4 col-sm-6 col-xs-6">
									<div class="product product-single">
										<div class="product-thumb">
											<div class="product-label">
												@if($item->sale != $item->price )
                                                	<span class="sale">{{ round(((($item->price)-($item->sale))/($item->price))*100) }} % </span>
                                            	@endif
											</div>
											<button class="main-btn quick-view" style="margin-left: -30px;"><i class="fa fa-search-plus"></i> <a href="{{ route('product_detail',$item['id']) }}">Chi tiết </a></button>
											<img  src="{{ asset('uploads/products/'.$item->thumbnail) }}" alt="" style="width: 200px; height: 200px; ">
										</div>
										<div class="product-body">
											@if($item->sale!=0)
			                                    <h3 class="product-price">{{ number_format($item->sale) }} VND </h3>
			                                    <del class="product-old-price">{{ number_format($item->price) }}</del>
			                                
			                                @else <h3 class="product-price">{{ number_format($item->price) }} VND </h3>
			                                @endif
											<h2 class="product-name"><a href="{{ route('product_detail',$item['id']) }}"> {{ $item->name }}</a></h2>
											<div class="product-btns">
												{{-- <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button> --}}
												{{-- <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button> --}}
												<a href="{{ url('cart/add/'.$item->id) }}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
											</div>
										</div>
									</div>
								</div>
							@endforeach
							
						</div>
						<!-- /row -->
						<div class="clearfix visible-sm visible-xs"></div>
					</div>
					<!-- /STORE -->

					
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection