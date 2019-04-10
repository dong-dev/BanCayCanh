@extends('layouts.admin')


@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <h1>
        Text Editors
      </h1>
    </section> --}}

    <!-- Main content -->
    <section class="content" style="margin-left:-200px; ">
      
      <div class="row">
        <div class="col-md-12">
          {!! Form::model($product,['method' => 'PATCH', 'url' => ['admin/product', $product->id], 'files' => true]) !!}
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Editor</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body pad">
              
                    <div class="form-group">
                      {!! Form::label('Category') !!}
                      {!! Form::select('category_id', $list, null, ['class'=>'form-control']) !!}
                      <br>
                    </div>
                    <div class="form-group">
                      {!! Form::label('Name') !!}
                      {!! Form::text("name", null, ['id'=>'txtName', 'class' => 'form-control']) !!}
                      {!! $errors->first('name', '<p style="color: red;">:message</p>') !!}
                      <br>
                    </div>
                    <div class="form-group">
                      {!! Form::label('Price') !!}
                      {!! Form::text("price", null, ['id'=>'txtPrice', 'class' => 'form-control']) !!}
                      <br>
                    </div>
                    <div class="form-group">
                      {!! Form::label('Sale') !!}
                      {!! Form::text("sale", null, ['id'=>'txtsale', 'class' => 'form-control']) !!}
                      <br>
                    </div>
                    <div class="form-group">
                      {!! Form::label('Thumbnail') !!}
                      {!! Form::file("thumbnail") !!}
                    </div>

                    @if(isset($product))
                        <br>
                        <img src="{{ url('uploads/products/' .$product['thumbnail']) }}" width="150">
                    @endif
                    <br>
                    <div class="form-group">
                      {!! Form::label('Description') !!}
                      {!! Form::textarea('description',null,['id' => 'editor1', 'class'=>'form-control', 'rows' => 10, 'cols' => 80]) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label('Tag') !!}
                      {!! Form::text("tag", null, ['id'=>'txtTag','class' => 'form-control']) !!}
                      <br>
                    </div>
                    <div class="form-group">
                      {!! Form::label('Status') !!}
                      {!! Form::select('status', [1=>'Có hàng',0=>'Hết hàng'], ['class' => 'form-control']) !!}
                    </div>
              
            </div>
          </div>
          <!-- /.box -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        {!! Form::close() !!}
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection