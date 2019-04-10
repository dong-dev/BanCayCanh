@extends('layouts.orderstt')

@section('content')
	
	<div class="row shop-tracking-status">
	    
	    <div class="col-md-12">
	        <div class="well">

	            <div class="order-status">

	                <div class="order-status-timeline">
	                    <!-- class names: c0 c1 c2 c3 and c4 -->
	                    
	                    @if($order->status == 0)
	                            <div class="order-status-timeline-completion c1"></div>
	                        @elseif ($order->status== 1)
	                            <div class="order-status-timeline-completion c2"></div>
	                        @elseif ($order->status== 2)
	                            <div class="order-status-timeline-completion c3"></div>
	                        @elseif ($order->status== 3) 
	                        	<div class="order-status-timeline-completion c4"></div>
	                      
	                    @endif
	                    {{-- <div class="order-status-timeline-completion c4"></div> --}}
	                </div>
	                <div class="image-order-status image-order-status-new active img-circle">
	                    <span class="status">Đơn hàng đã đặt</span>
	                    <div class="icon"></div>
	                </div>

	                <div class="image-order-status image-order-status-active active img-circle">
	                    <span class="status">Đã xác nhận thông tin thanh toán</span>
	                    <div class="icon"></div>
	                </div>
	                <div class="image-order-status image-order-status-intransit active img-circle">
	                    <span class="status">Đơn hàng đang giao</span>
	                    <div class="icon"></div>
	                </div>
	                <div class="image-order-status image-order-status-delivered active img-circle">
	                    <span class="status">Đơn hàng đã nhận </span>
	                    <div class="icon"></div>
	                </div>
	                <div class="image-order-status image-order-status-completed active img-circle">
	                    <span class="status">Hoàn thành đơn hàng</span>
	                    <div class="icon"></div>
	                </div>

	            </div>
	        </div>
	    </div>

	</div>
@endsection