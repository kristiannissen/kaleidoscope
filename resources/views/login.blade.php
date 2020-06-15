@extends('layouts.storefront')

@section('title', 'Hello Kitty')

@section('content')
<div>
  <form action="/login/" method="post">
    @csrf
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit">
  </form>
</div>
@endsection

@section('custom_scripts')
<amp-analytics>
  <script type="application/json">
    {
      "requests": {
        "pageview": "/api/tracker/RANDOM/?event=${eventName}&id=${elementId}&type=${elementType}",
        "error": "/api/error/RANDOM/"
      },
      "triggers": {
        "trackPageview": {
          "on": "visible",
          "request": "pageview",
          "vars": {
            "eventName": "pageview",
            "elementId": "0",
            "elementType": "LoginPage"
          }
        },
        "userError": {
          "on": "user-error",
          "request": "error"
        }
      },
      "transport": {
        "xhrpost": true,
        "useBody": true
      }  
    }
  </script>
</amp-analytics>
@endsection