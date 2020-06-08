<!doctype html>
<html amp lang="">
  <head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <style amp-custom>
      main {
        display: flex;
        justify-content: center;
        align-items: flex-start;
      }
    @yield('amp_ld_json')
    @yield('amp_custom_styles')
    @yield('amp_components')
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript> 
  </head>
  <body>
    <header></header>
    <main>@yield('content')</main>
    <footer></footer>
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