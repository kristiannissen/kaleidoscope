<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>@yield('title') | Kaleidoscope</title>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />
  </head>
  <body>
    <div class="mdl-layout__container">
      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">@yield('title')</span>
            <nav class="mdl-navigation">
              <a class="mdl-navigation__link" href="/blogposts/">Dashboard</a>
              <a class="mdl-navigation__link" href="/blogposts/">Blogposts</a>
              <a class="mdl-navigation__link" href="/blogposts/create/">New Blog Posts</a>
              <a class="mdl-navigation__link" href="">Profile</a>
            </nav>
          </div>
          <main class="mdl-layout__content">
            <div class="page-content">@yield('content')</div>
          </main>
      </div>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
