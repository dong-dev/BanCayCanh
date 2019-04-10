@extends('layouts.admin')


@section('content')
    <div class="container-fluid">
        <h2> Category list </h2>

        @if(Session::has('success'))
            <p style="color: green; "> {{ Session::get('success') }}</p>

        @endif
        @if(Session::has('error'))
            <p style="color: red; "> {{ Session::get('error') }}</p>
        @endif
        @if (Session()->has('flash_level'))
            <div class="alert alert-success">
                <ul>
                    {!! Session::get('flash_massage') !!}   
                </ul>
            </div>
        @endif
        
        <!--ModalcreateCate-->
            <div class="modal fade" id="createCateModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> Create New Category </h4>
                </div>
                <div class="modal-body"></div>
              </div>
            </div>
          </div>
        <button type="button" class="btn btn-info btn-lg create-cate-btn" data-url="{{ url('admin/category/create') }}" > New </button>


        <!--ModaleditCate-->
        <div class="modal fade" id="editCateModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> Edit Category </h4>
                </div>
                <div class="modal-body"></div>
              </div>
            </div>
        </div>
        
        <br><br>
        
            <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role="row">
                        <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="" >ID</th>
                        <th class="sorting_asc col-md-4" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Parent Category</th>
                        <th class="sorting_asc col-md-4" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Name</th>
                        <td>Action</td>
                    </tr>
                </thead>
                @if (isset($listCategory))
                    @foreach($listCategory as $item)
                        <tr>
                            <td> {{ $item->id }}</td>
                            <td> {{ $listPR[$item->parent_id] }} </td>
                            <td> {{ $item->name }}</td>
                            {{-- <td> {{ $item->parent_id }} </td>  --}}
                            <td>
                               {!! Form::open(['method'=> 'DELETE', 'url' => ['admin/category', $item->id]]) !!}
                                        <input class="btn btn-danger" type="submit" value="Delete"  onclick="return confirm ('Are you sure??'); ">
                                {!! Form::close() !!}
                                <button type="button" class="btn btn-info btn-lg edit-cate-btn" data-url="{{ url('admin/category/'.$item->id.'/edit') }}" >Edit</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        
    </div>

@endsection

