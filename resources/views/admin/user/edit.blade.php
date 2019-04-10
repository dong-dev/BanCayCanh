{!! Form::model($user, ['method' => 'PATCH', 'url' => ['admin/user', $user->id]]) !!}
    @include('admin.user.form')
{!! Form::close() !!}
