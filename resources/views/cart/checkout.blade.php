@extends('layouts.pro')

@section('content')
<div class="clearfix">
    <div class = "formcheckout">
    {{-- @if(!Auth::guest()) --}}

        @if(count($errors) > 0 )
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif
        {{ Form::open(['method' => 'POST', 'url' => 'cart/order']) }}
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Họ Tên Người nhận : ') !!}
                {{ Form::text('name', null, ['id'=>'txtName', 'class' => 'form-control', 'placeholder' => 'Name']) }}
            </div>
            <div class="form-group">
                {!! Form::label('Địa chỉ người nhận : ') !!}
                {{ Form::text('address', null, ['id'=>'txtAddress', 'class' => 'form-control', 'placeholder' => 'Address']) }}
            </div>
            <div class="form-group">
                {!! Form::label('Số điện thoại : ') !!}
                {{ Form::text('phone', null, ['id'=>'txtPhone', 'class' => 'form-control', 'placeholder' => 'Phone']) }}
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('Mail : ') !!}
                {!! Form::text('mail', null, ['id'=>'txtMail', 'class' => 'form-control', 'placeholder' => 'Mail']) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('Loại hình thanh toán : ') !!}<br>
                {!! Form::select('type', [0 => 'Giao Hang tiet kiem (8-10 ngay)', 1 =>'Giao hang nhanh (2-4 ngay)'] , null , ['class' => 'form-control']) !!}
                    
            </div>
            {{ Form::submit('Mua Hang',['class' => 'btn btn-info btn-lg']) }}
        </div>
        {{ Form::close() }}
    {{-- @elseif(!Auth::guest())
        {{ Form::model(Auth::user()->id, ['method' => 'POST', 'url' => 'cart/order']) }}
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Họ Tên Người nhận : ') !!}
                {{ Form::text(Auth::users()->name, null, ['id'=>'txtName', 'class' => 'form-control', 'placeholder' => 'Name']) }}
            </div>
            <div class="form-group">
                {!! Form::label('Địa chỉ người nhận : ') !!}
                {{ Form::text(Auth::user()->address, null, ['id'=>'txtAddress', 'class' => 'form-control', 'placeholder' => 'Address']) }}
            </div>
            <div class="form-group">
                {!! Form::label('Số điện thoại : ') !!}
                {{ Form::text(Auth::user()->phone, null, ['id'=>'txtPhone', 'class' => 'form-control', 'placeholder' => 'Phone']) }}
            </div>
            <div class="form-group">
                {!! Form::label('Mail : ') !!}
                {!! Form::text(Auth::user()->mail, null, ['id'=>'txtMail', 'class' => 'form-control', 'placeholder' => 'Mail']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Loại hình thanh toán : ') !!}<br>
                {!! Form::select('type', [0 => 'Giao Hang tiet kiem (8-10 ngay)', 1 =>'Giao hang nhanh (2-4 ngay)'] , null , ['class' => 'form-control']) !!}
                    
            </div>
            {{ Form::submit('Mua Hang',['class' => 'btn btn-info btn-lg']) }}
        </div>
        {{ Form::close() }} --}}
    {{-- @endif --}}
    </div>
</div>

@endsection