<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Playroom')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
