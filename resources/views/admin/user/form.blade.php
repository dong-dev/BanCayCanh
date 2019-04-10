<div class="box-body">
	
	<div class="form-group">
		{!! Form::label('Name') !!}
		{!! Form::text("name", null, ['id'=>'txtName', 'class' => 'form-control']) !!}
		{!! $errors->first('name', '<p style="color: red;">:message</p>') !!}
		<br>
	</div>
	<div class="form-group">
		{!! Form::label('Email') !!}
		{!! Form::text("email", null, ['id'=>'txtEmail', 'class' => 'form-control']) !!}
		<br>
	</div>
	<div class="form-group">
		{!! Form::label('Password') !!}
		{!! Form::password("password",['id'=>'txtPass','class' => 'form-control']) !!}
		<br>
	</div>
	<div class="form-group">
		{!! Form::label('Phone') !!}
		{!! Form::text("phone", null, ['id'=>'txtPhone','class' => 'form-control']) !!}
		<br>
	</div>
	<div class="form-group">
		{!! Form::label('Group') !!}
		{!! Form::select('group_id', ['1'=>'Admin', '2'=>'User', '3'=>'Manage']) !!}
		<br>
	</div>
	<div class="form-group">
		{!! Form::label('Address') !!}
		{!! Form::text("address", null, ['id'=>'txtAddress', 'class' => 'form-control']) !!}
	<br>
	</div>
	<div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>