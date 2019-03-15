<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script defer src="/js/manifest.js"></script>
        <script defer src="/js/vendor.js"></script>
        <script defer src="/js/app.js"></script>
    </head>
    <body>
        <div id="app" class="mdl-layout__container">
            <div class="mdl-layout mdl-js-layout is-upgraded">
            <main class="mdl-layout__content">
                @yield('content')
                <footer class="mdl-mini-footer">
                    <div class="mdl-mini-footer--left-section">left</div>
                    <div class="mdl-mini-footer--right-section">right</div>
                </footer>
            </main>
            </div>
        </div>
    </body>
</html>