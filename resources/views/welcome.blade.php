<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/js/app.js','resources/css/app.css'])
<!--    <link href="public/common/css/tailwindcss.css" rel="stylesheet">-->
</head>
<body class="antialiased">
<div id="app"></div>
@yield('content')
</body>


{{--@foreach($user as $memo)--}}
{{--    <div>--}}
{{--        <span>{{ $memo->test}}</span>--}}
{{--    </div>--}}
{{--@endforeach--}}

</html>



{{--@extends('layouts.menu')--}}

{{--@section('title')--}}
{{--    Welcome--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <h2>News List</h2>--}}
{{--    @foreach ($user as $item)--}}
{{--        제목: {{$item -> idtest}}<br>--}}
{{--        내용: {{$item -> test}}<br>--}}
{{--    @endforeach--}}

{{--@endsection--}}
