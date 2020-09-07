<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/css/app.css" />
        @yield('head')
    </head>
    <body>
        @yield('body-pre-app')
        <div id="app">
            @yield('content')
        </div>
        @yield('body-post-app')
        <script src="/js/app.js"> </script>
    </body>
</html>