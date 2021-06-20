<!DOCTYPE html>
<html>
<head>
    @yield('head')
</head>
<body>
    <header>
    @yield('header')
    </header>
    <div class="columns">
        @yield('content')
    </div>
    <footer class="footer">
    @yield('footer')
    </footer>
</body>
</html>