<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


</head>

<body class="">



    <div class="flex justify-">
        <h1> This is test</h1>
        <br>
        <a href="{{ url('/slider') }}">Slider Page</a>
        <br>
        <a href="{{ url('/post') }}">Post Page</a>
    </div>

</body>

</html>
