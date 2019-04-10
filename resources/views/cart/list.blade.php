@extends('layouts.pro')

@section('content')
	<section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Trang chủ</a></li>
          <li class="active">Giỏ hàng</li>
        </ol>
      </div>
      <div class="table-responsive cart_info">
        @if($list->count() > 0)
          <div class="col-md-12">
            <div class="order-summary clearfix">
              <table class="shopping-cart-table table">
                <thead>
                  <tr>
                    <th>Hình ảnh</th>
                    <th>Tên Sản phẩm</th>
                    <th class="text-center">Đơn gía</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Thành tiền</th>
                    <th class="text-right"></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($list as $row_id => $item)
                  <tr class='product-item'>
                    <td class="thumb">
                      <img src="{{ url('uploads/products/'.$item->options['thumbnail']) }}" alt="" style="width: 50px;">
                    </td>
                  
                    <td class="details">
                      <h4><a href="{{ url('product_detail/'.$item->id) }}">{{ $item->name }}</a></h4>
                    
                    </td>
                    <td class="price text-center" data-price={{ $item->price }}>
                      <strong style="color: red;"> {{ number_format($item->price) }} VND </strong>
                        @if($item->price != $item->options['original_price'])
                            <br>
                            <del class="font-weak">
                              <small>{{ number_format($item->options['original_price']) }}</small>
                            </del>
                        @endif
                    </td>
                    <td class="qty text-center">
                        {{ Form::open(['method' => 'POST', 'url' => 'cart/update']) }}
                          <input type="hidden" name="row_id" value="{{  $row_id }}" />
                          <input class="input" type="number" min="1" max="10" name="qty" value="{{ $item->qty }}" />
                          {{ Form::submit('Update') }}
                        {{ Form::close() }}
                    </td>
                    <td class="total text-center">
                        <strong class="totalValue" class="primary-color" style="color: red;">{{ number_format($item->price * $item->qty)}}</strong>
                    </td>
                    <td class="text-right">
                        <button class="main-btn icon-btn">
                          <a class="cart_quantity_delete" href="{{ url('cart/remove/'.$item->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng?');">
                              <i class="fa fa-times"></i>
                          </a>
                        </button>
                    </td>
                  </tr>
                    
                </tbody>
                  
                @endforeach

                <tfoot>
                  <tr>
                    <th class="empty" colspan="3"></th>
                    <th> TẠM TÍNH </th>
                    <th colspan="2" class="total" style="color:red;"></th>
                  </tr>
                  <tr>
                    <th class="empty" colspan="3"></th>
                    <th>SHIPPING</th>
                    <td colspan="2" id="shipping"></td>
                  </tr>
                  <tr>
                    <th class="empty" colspan="3"></th>
                    <th>TỔNG TIỀN</th>
                    <th colspan="2" class="sub-total" style="color:red;"> </th>
                  </tr>
                </tfoot>
              </table>
                <button type="button" class="pull-right btn btn-info btn-lg">
                  <a href="{{ asset('cart/checkout') }}">Mua Hàng</a>
                </button>
                @else
                    <p>Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                @endif
            </div>

          </div>

      </div>
    </div>
</section> 
@endsection