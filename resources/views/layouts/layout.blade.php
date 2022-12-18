<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/js/app.js','resources/css/app.css'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="antialiased max-w-5xl mg-">
<div id="app" class="w-full max-w-md m-auto">
    <div><header_search/></div>
    @yield('content')
</div>

</body>
@yield('scripts')
@vite(['resources/js/app.js','resources/css/app.css'])
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</html>


