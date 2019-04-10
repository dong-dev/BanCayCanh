
{!! Form::model($product,['method' => 'PATCH', 'url' => ['admin/product', $product['id']], 'files' => true]) !!}
		@include('admin.product.form')
{!! Form::close() !!}




