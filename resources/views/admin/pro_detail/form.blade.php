<div class="box-body">
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
		{!! Form::label('Thumbnail') !!}
		{!! Form::file("thumbnail") !!}
	</div>

	@if(isset($product))
	    <br>
	    <img src="{{ url('uploads/products/' .$product['thumbnail']) }}" width="150">
	@endif
	<br>


	{!! Form::label('Description') !!}
	{!! Form::text("description", null, ['id'=>'txtDescription','class' => 'form-control']) !!}
	<br>

	{!! Form::label('Promo1') !!}
	{!! Form::text("promo1", null, ['id'=>'txtPromo1','class' => 'form-control']) !!}
	<br>	

	{!! Form::label('Promo2') !!}
	{!! Form::text("promo2", null, ['id'=>'txtPromo2','class' => 'form-control']) !!}
	<br>

	{!! Form::label('Promo3') !!}
	{!! Form::text("promo3", null, ['id'=>'txtPromo3','class' => 'form-control']) !!}
	<br>

	{!! Form::label('Tag') !!}
	{!! Form::text("tag", null, ['id'=>'txtTag','class' => 'form-control']) !!}
	<br>
	{!! Form::label('Status') !!}
	{!! Form::select('status', [1=>'Có hàng',0=>'Hết hàng'], ['class' => 'form-control']) !!}

	<br>
	<div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>


