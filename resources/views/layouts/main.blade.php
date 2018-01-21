<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/css/main.css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600&amp;subset=cyrillic" rel="stylesheet">
</head>
<body>

<div class="row">
    <div class="one column"></div>
    <div class="eleven columns">
        <h2 onclick="location='/'" style="cursor: pointer">Blog</h2>
    </div>
</div>

<hr style="margin-top: 0">

<div class="container">
    @yield('content')
</div>
</body>
</html>
