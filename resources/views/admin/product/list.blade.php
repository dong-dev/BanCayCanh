@extends('layouts.admin')


@section('content')
    <div class="container-fluid">
        <h2> Product list </h2>

        @if(Session::has('success'))
            <p style="color: green; "> {{ Session::get('success') }}</p>

        @endif
        <!--ModalcreateProduct-->
        <div class="modal fade" id="createProModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> Create New Product </h4>
                </div>
                <div class="modal-body"></div>
              </div>
            </div>
        </div>
        <button type="button" class="btn btn-info btn-lg create-pro-btn" data-url="{{ url('admin/product/create') }}" > New </button>
        <br><br>

        <!--ModaleditProduct-->
        <div class="modal fade" id="editProModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> Edit Product </h4>
                </div>
                <div class="modal-body"></div>
              </div>
            </div>
        </div>
        
        <div class="col-md-12">
            {!! Form::open(['method'=> 'GET', 'url' => 'admin/product']) !!}
            {!! Form::text('keyword') !!}
            {!! Form::submit('Search') !!}
            {!! Form::close() !!}
            <div class="pull-right">
                <div class="product-slick-dots-1 custom-dots"></div>
            </div>
        </div>
        <br><br>

        <table border="1" class="table table-hover">
            <tr class="danger" style="text-align: center;">
                <td>ID</td>
                <td>Category</td>
                <td>Name</td>
                <td>Price</td>
                <td>Sale</td>
                <td>Avatar</td>
                <td>Tag</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
            <div id="product-slick-1" class="product-slick">
                @if (isset($list))
                    @foreach($list as $item)
                        <tr>
                            <td> {{ $item->id }} </td>
                            <td> {{ $item->category->name }}</td>
                            <td> {{ $item->name }}</td>
                            <td> {{ number_format($item->price) }}</td>
                            <td> {{ number_format($item->sale) }}</td>
                            <td>
                                <img src="{{ url('../uploads/products/'.$item->thumbnail)}}" width="150">

                            </td>
                            <td> {{ $item->tag }} </td>
                            <td> {{ $item->status }} </td>
                            <td>
                                
                                <button type="button" class="btn btn-info" style="height: 35px; font-size: 12px; margin: 10px;" data-url="{{ url('admin/pro_detail/'. $item->id.'/detail') }}" > <a href="{{ route('admin/pro_detail/list', $item['id']) }} " style=" color: #fff; "> Detail</a> </button>
                                
                                {!! Form::open(['method'=> 'DELETE', 'url' => ['admin/product', $item->id]]) !!}
                                <input type="submit" value="Delete" style="height: 35px; font-size: 12px; margin: 8px; padding: 9px 10px; border-radius: 5px; background: #44c1ef; color: white;"  onclick="return confirm ('Are you sure??'); ">
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </div>
        </table>
    </div>

@endsection
