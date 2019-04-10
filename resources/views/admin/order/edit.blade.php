@extends('layouts.admin')


@section('content')
	<section class="content-header">
        <h1>
            Chi tiết đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Bill</a></li>
            <li class="active">List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container123  col-md-6"   style="">
                            <h4></h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="col-md-4">Thông tin khách hàng</th>
                                    <th class="col-md-6"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Thông tin người đặt hàng</td>
                                    <td>{{ $order->user->name }}</td>
                                </tr>
                              <tr>
                                  <td>Ngày đặt hàng</td>
                                  <td>{{ $order->created_at}}</td>
                              </tr>
                              <tr>
                                  <td>Số điện thoại</td>
                                  <td>{{ $order->user->phone }}</td>
                              </tr>
                              <tr>
                                  <td>Địa chỉ</td>
                                  <td>{{ $order->user->address }}</td>
                              </tr>
                              <tr>
                                  <td>Email</td>
                                  <td>{{ $order->user->mail}}</td>
                              </tr>
                              <tr>
                                  <td>Ghi chú</td>
                                  <td>{{ $order->type}}</td>
                              </tr> 
                                </tbody>
                            </table>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting col-md-1" >STT</th>
                                <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                <th class="sorting col-md-2">Số lượng</th>
                                <th class="sorting col-md-2">Giá tiền</th>
                            </thead>
                            <tbody>
                              <?php $total = 0; ?>
                            @foreach($order->detail as $key => $item)
                             <tr>
                                 <td>{{ $key+1 }}</td>
                                 <td>{{ $item->product->name }}</td>
                                 <td>{{ $item->quantity }}</td>
                                 <td>{{ number_format($item->price * $item->quantity) }} VNĐ</td>
                             </tr>
                             <?php $total+= $item->price * $item->quantity; ?>
                            @endforeach
                            <tr>
                                <td colspan="3"><b>Tổng tiền</b></td>
                                <td colspan="1"><b class="text-red">{{ number_format($total) }} VNĐ</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                  {!! Form::open(['method' => 'PATCH', 'url' => ['admin/order', $order->id]]) !!}
                   <div class="col-md-8"></div>
                   <div class="col-md-4">
                       <div class="form-inline">
                           <label>Trạng thái giao hàng: </label>
                           <select name="status" class="form-control input-inline" style="width: 200px">
                               <option value="1">Dang giao hang</option>
                               <option value="2">Đa giao hang </option>
                               <option value="3">Hoan thanh don hang</option>
                               <option value="4">Don hang bi huy</option>
                           </select>
               
                           <input type="submit" value="Xử lý" class="btn btn-primary">
                       </div>
                   </div>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection