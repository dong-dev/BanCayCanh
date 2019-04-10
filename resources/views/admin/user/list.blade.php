@extends('layouts.admin')


@section('content')
    <div class="container-fluid">
        <h2> User list </h2>

        @if(Session::has('success'))
            <p style="color: green; "> {{ Session::get('success') }}</p>
        @endif

        <!-- ModaleditUser -->
          <div class="modal fade" id="editUserModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> Edit</h4>
                </div>
                <div class="modal-body"></div>
              </div>
            </div>
          </div>


        <!--ModalcreateUser-->
            <div class="modal fade" id="createUserModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> Create New User </h4>
                </div>
                <div class="modal-body"></div>
              </div>
            </div>
          </div>
        <button type="button" class="btn btn-info btn-lg create-user-btn" data-url="{{ url('admin/user/create') }}" > New </button>
        <br><br>
        {!! Form::open(['method'=> 'GET', 'url' => 'admin/user']) !!}
        {!! Form::text('keyword') !!}
        {!! Form::submit('Search') !!}
        {!! Form::close() !!}
        <br><br>
        <table border="1" class="table table-hover">
            <tr class="danger" style="text-align: center;">
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Group</td>
                <td>Address</td>
                <td>Action</td>

            </tr>
            @if (isset($list))
                @foreach($list as $item)
                    <tr>
                        <td> {{ $item->id }}</td>
                        <td> {{ $item->name }}</td>
                        <td> {{ $item->email }}</td>
                        <td> {{ $item->phone }}</td>
                        <td> {{ $item->group['name'] }}</td>
                        <td> {{ $item->address }}</td>
                        <td>
                                {!! Form::open(['method'=> 'DELETE', 'url' => ['admin/user', $item->id]]) !!}
                                    <input class="btn btn-danger" type="submit" value="Delete"  onclick="return confirm ('Are you sure??'); ">
                                {!! Form::close() !!}
                    
                                <button type="button" class="btn btn-info btn-lg edit-user-btn" data-url="{{ url('admin/user/'.$item->id.'/edit') }}" >Edit</button>

                                
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

@endsection