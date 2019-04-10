@extends('layouts.admin')


@section('content')
    <div class="container">
        <h2> Group list </h2>
        <table border="1" class="table table-responsive">
            <tr>
                <td>#</td>
                <td>Name</td>
            </tr>

            @foreach($list as $item)
                <tr>
                    <td> {{ $item->id }}</td>
                    <td> {{ $item->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection