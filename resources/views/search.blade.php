
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/js/app.js','resources/css/app.css'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body class="antialiased">
<div id="header"></div>
<div id="searchMain" class = "w-full h-full"></div>
<div id="sideMenu" class = "absolute right-0 top-0" ></div>
</body>

</html>

