<!doctype html>
<html amp lang="">
  <head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('amp_ld_json')
    @yield('amp_custom_styles')
    @yield('amp_components')
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript> 
  </head>
  <body class="{{ $super_key }}">
    <header class="site-header">
      <h1 class="site-title">Kaleidoscope</h1>
      <nav class="site-navigation">
        <ul class="site-navigation--items">
          <li class="site-navigation--items-item">
            <a href="/">Home</a>
          </li>
          <li class="site-navigation--items-item">
            <a href="/">About</a>
          </li>
        </ul>
      </nav>
    </header>
    <main class="site-content">@yield('content')</main>
    <footer class="site-footer"></footer>
    <amp-analytics>
      <script type="application/json">
          {
            "requests": {
              "pageview": "/api/pixel/RANDOM"
            },
            "triggers": {
              "trackPageview": {
                "on": "visible",
                "request": "pageview"
              }
            }
          }
        </script>
    </amp-analytics>
  </body>
</html>