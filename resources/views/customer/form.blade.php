<div class="form-group">
	{!! Form::label('Name') !!}
	{!! Form::text("name", null, ['id'=>'txtName', 'class' => 'form-control']) !!}
	{!! $errors->first('name', '<p style="color: red;">:message</p>') !!}
	<br>
</div>
<div class="form-group">
	{!! Form::label('Password') !!}
	{!! Form::password("password", null, ['id'=>'pass', 'class' => 'form-control']) !!}
	{!! $errors->first('password', '<p style="color: red;">:message</p>') !!}
	<br>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-primary">Đăng nhập</button>
</div>