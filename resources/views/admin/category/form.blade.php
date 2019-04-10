<div class="box-body">
	<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
		{!! Form::label('Category') !!}
		{!! Form::select('parent_id',$list, null, ['class'=>'form-control']) !!}
		<span class="text-danger">{{ $errors->first('parent_id') }}</span>
	</div>
	<div class="form-group">
		{!! Form::label('Name') !!}
		{!! Form::text("name", null, ['id'=>'txtName', 'class' => 'form-control']) !!}
		{!! $errors->first('name', '<p style="color: red;">:message</p>') !!}
		<br>
	</div>
	<div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
 </div>



