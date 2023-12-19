<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LuLeCon</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

</head>

<body>
    @include('navigation')

    <div class="content-sidebar-container">
        <div class="content">
            @yield('content')
        </div>
        <div class="sidebar">
            @include('sidebar')
        </div>
    </div>

    <div class="footer">
        @include('footer')
    </div>
</body>

</html>
