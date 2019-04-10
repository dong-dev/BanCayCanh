
{!! Form::model($category,['method' =>'PATCH','url' => ['admin/category', $category['id']]]) !!}
	@include('admin.category.form')
{!! Form::close() !!}

