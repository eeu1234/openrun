<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/js/app.js','resources/css/app.css'])

</head>
<body class="antialiased">
<div id="app"></div>
<div id="app1"></div>

@foreach($user as $memo)
    <div>
        <span>{{ $memo->STORENAME}}</span>
    </div>
@endforeach
</body>

</html>

