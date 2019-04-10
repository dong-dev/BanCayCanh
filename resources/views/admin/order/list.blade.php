@extends('layouts.admin')


@section('content')
    <div class="container-fluid">
        <h2> Danh Sách Đơn Đặt Hàng </h2>

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

        <div class="box">
            <div class="box-header with-border">
                <div class="row">
            <div class="col-md-12">
                <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="" >ID</th>
                        <th class="sorting_asc col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Tên Khách Hàng</th>
                        <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Địa chỉ</th>
                        <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">SDT</th>
                        <th>Email</th>
                        <th>Total</th>
                        <th>Trạng thái</th>
                        <th>Loại hình thanh toán</th>
                        <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Ngày đặt hàng</th>
                        <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Chi tiết đơn hàng</th>
                       {{--  <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Huy</th></tr> --}}
                    </thead>
                    <tbody>
                        @foreach($cus as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->mail }}</td>
                                <td>{{ number_format($item->total) }}</td>
                                @if($item->status == 0)
                                    <td style="color: yellow;">Dang cho xu li</td>
                                @elseif($item->status == 1)
                                    <td style="color: blue;">Dang giao hang</td>
                                @elseif($item->status == 2)
                                    <td style="color: green;">Da giao hang</td>
                                @elseif($item->status == 3)
                                    <td style="color: green;">Hoan thanh don hang</td>
                                @else
                                    <td style="color:red;">Don Hang Bi Huy</td>                                
                                @endif
                                
                                @if($item->type==0)
                                    <td>Giao Hang Tiet Kiem (8-10 ngay)</td>
                                @else 
                                    <td>Giao Hang Nhanh (2-4 ngay)</td>
                                @endif
                                <td>{{ $item->created_at }}</td>
                                <td><a href="{{ url('admin/order') }}/{{ $item->id }}/edit">Chi tiết</a></td>
                                <td>
                                    <form action="{{ url('admin/order/edit')}}/{{ $item->id }}/" method="post" id="formDelete">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{-- <input type="submit" value="Hủy đơn" class="btn btn-danger">
                                        {{ csrf_field() }} --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            </div>
        </div>
        


        
    </div>

@endsection

