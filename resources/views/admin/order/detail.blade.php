@extends('layouts.admin')

@section('content')
	<div class="container-fluid">
        <h2> Chi Tiết Đơn Đặt Hàng </h2>
		<div class="row">
			<div class="col-lg-12">
				<form action="" method="POST" role="form">	
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
       				 @if(Session::has('success'))
           				 <p style="color: green; "> {{ Session::get('success') }}</p>

        			 @endif
        
        			 @if (Session()->has('flash_level'))
	           		 	 <div class="alert alert-success">
			                <ul>
			                    {!! Session::get('flash_massage') !!}   
			                </ul>
	            		 </div>
        			 @endif
    			
    	
        		<br>
			       	<table border="1" class="table table-hover">
			            <tr class="danger" style="text-align: center;">
			                <td>ID</td>
			                <td>Tên Khách Hàng</td>
			                <td>Địa chỉ</td>
			                <td>SDT</td>
			                <td>Mail</td>
			                <td>Tổng tiền</td>
			                <td>Trạng thái</td>
			                <td>Loại hình thanh toán</td>
			                <td>Ngày đặt</td>
			                
			            </tr>
			            <tr>
							<td>{!!$order->id!!}</td>
							<td>{!!$order->name!!}</td>
							<td>{!!$order->address!!}</td>
							<td>{!!$order->phone!!}</td>
							<td>{!!$order->mail !!}</td>
							<td>{!!number_format($order->total)!!} (Vnđ) </td>
							<td>{!!$order->status!!}</td>
							<td></td>
							<td>{!!$order->created_at!!}</td>
						</tr>
			        </table>
    
    				<div class="panel-heading"> Chi Tiết Sản Phẩm trong đơn hàng </div>
    				<div class="panel-body">
    				<div class="table-responsive">
    					<table border="1" class="table table-hover">
			    			<thead>
			    				<tr> 
									<th>ID</th>
									<th>Hình ảnh</th>
									<th>Tên Sản Phẩm</th>
									<th>Giới thiệu sản phẩm</th>
									<th>Số lượng</th>
									<th>Gía bán</th>
									<th>Trạng Thái</th>
									<th>Action</th>
			    				</tr>
			    			</thead>
			    			<tbody>
								@foreach($data as $row)
									<tr>
										<td>{!!$row->id!!}</td>
										<td> <img src="{!!url('public/uploads/products/'.$row->thumbnail)!!}" width="50" height="40"></td>
										<td>{!!$row->name!!}</td>
										<td>{!!$row->description!!}</td>
										<td>{!!$row->quantity!!} </td>
										<td>{!! number_format($row->price) !!} Vnđ</td>
										<td>
											@if($row->status == 1)
												<span style="color:blue;">Còn hàng</span>
											@else
												<span style="color:#27ae60;"> Tạm hết</span>
											@endif
										</td>
										<td>
										    <a href="{!!url('')!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove"> Remove </span> </a>
										</td>
									</tr>
								@endforeach
			    			</tbody>
    					</table>
    				</div>
    			</div>
    			<br>
					<button type="submit" onclick="return xacnhan('Are you sure ?')"  class="btn btn-danger"> YES </button>
    		</form>
    	</div>
    </div>
</div>
@endsection 