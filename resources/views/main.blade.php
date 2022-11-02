@extends('welcome')
@section('content')

    @foreach($user as $memo)
        <div>
            <span>{{ $memo->test}}</span>
        </div>
    @endforeach
@endsection
