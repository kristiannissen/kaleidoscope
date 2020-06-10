<!DOCTYPE html>
<html ⚡>
  <head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    @yield('amp_ld_json')
    <style amp-custom>
      *,
      *:before,
      *:after {
        box-sizing: border-box;
      }

      /* Mobile first */

      body {
        font: normal normal 16px "Lato", sans-serif;
        line-height: 1.5;
        background-color: pink;
        color: #171617;
      }

      /* Typo */

      p {
        margin-top: 0;
        margin-bottom: 1.5em;
        font-size: 1em;
        line-height: 1.5;
      }

      h1 {
        font-size: 1.875em;
        line-height: 1.2;
        font-family: Playfair Display, serif;
        margin-top: 0.88889em;
        margin-bottom: 0.44444em;
      }

      h2 {
        font-size: 1.5em;
        line-height: 1.5;
        font-family: Playfair Display, serif;
        margin-top: 1.33333em;
        margin-bottom: 0.66667em;
      }

      h3 {
        font-size: 1.3125em;
        line-height: 1.14286;
        margin-top: 2em;
        margin-bottom: 1em;
      }

      blockquote p {
        quotes: "\201C" "\201D" "\2018" "\2019";
        font: italic bold 1.5em Playfair Display, serif;
        line-height: 1.5;
        margin-bottom: 0;
      }

      blockquote p::before {
        content: open-quote;
      }

      blockquote p::after {
        content: close-quote;
      }

      /* Elements */

      .site-header {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        height: 100px;
        overflow-wrap: break-word;
        word-wrap: break-word;
        -webkit-hyphens: auto;
            -ms-hyphens: auto;
                hyphens: auto;
      }

      .site-header--title {
        font-family: serif;
        font-size: 2.75em;
        text-transform: uppercase;
        margin: 0;
      }

      .site-header--navigation {
        min-width: 10em;
      }

      .site-header--navigation .site-navigation--items {
        margin: 0;
        padding: 0;
        list-style-type: none;
        display: flex;
        justify-content: space-around;
      }

      .site-content .blog-post {
        /*padding: 0 1.125em;*/
      }

      .blog-post--header,
      .blog-post--excerpt,
      .blog-post--readmore {
        padding: 0 1.125em;
      }

      .site-content--blogposts {
        
      }

      .blog-post--first {
        
      }

      .blog-post--first .blog-post--header {
        
      }
      
      .blog-post--first .blog-post--title a {
        
      }

      .blog-post--title a {
        text-decoration: none;
        outline: 0;
        color: #171617;
      }

      .blog-post--title a:active,
      .blog-post--title a:hover,
      .blog-post--title a:active {
        outline: 0;
        color: #000;
      }

      .blog-post--readmore {
        display: flex;
        justify-content: flex-end;
      }

      .blog-post--readmore a {
        display: inline-block;
        cursor: pointer;
        padding: 8px;
        border-radius: 2x;
        text-transform: uppercase;
        color: rgba(0, 0, 0, 0.54);
        text-decoration: none;
      }

      .blog-post--readmore a:hover {
        background-color: rgba(0, 0, 0, 0.12);
      }

      .ctrl_blog .blog-post--excerpt {
        text-transform: uppercase;
        font: italic normal 1em sans-serif;
        font-weight: 700;
      }

      .blog-post--header {
        margin-bottom: 1.5em;
      }

      .site-footer {
        background-color: #171617;
        color: #fff;
        min-height: 75px;
      }

      .card {
        box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
        margin: 0 1.125em;
      }
      .card--title {
        margin: 0 1.125em;
      }
      .card--content {
        margin: 0 1.125em;
      }

      @media (min-width: 43em) {
        /* Landscape large phone, tablet portrait */

        body {
          background-color: red;
        }
      }

      @media (min-width: 62em) {
        /* Landscape tablet, portrait large tablet */

        body {
          background-color: blue;
        }

        .site-header {
          justify-content: space-between;
          padding: 0 2em;
        }

        .site-content {
          display: flex;
          width: 60em;
          justify-content: center;
          margin: 0 auto;
        }

        .site-content--blogposts {
          width: 40em;
        }

        .site-content--sidebar {
          width: 20em;
          align-items: stretch;
          padding: 0 1.125em;
        }

        .blog-post--post {
          max-width: 40em;
        }

        .blog-post--sidebar {
          max-width: 20em;
        }
      }

      @media (min-width: 82em) {
        /* Landscape large tablet, desktop */

        body {
          background-color: yellow;
        }
      }
    @yield('amp_custom_styles')
    </style>
    @yield('amp_components')
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript> 
  </head>
  <body class="{{ $super_key }}">
    <header class="site-header">
      <h1 class="site-header--title">Kaleidoscope</h1>
      <nav class="site-header--navigation">
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
  </body>
  @yield('custom_scripts')
</html>