@extends('layouts.storefront')

@section('title', $blog_post->title)

@section('amp_ld_json')
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage": "{{ url()->current() }}",
    "headline": "{{ $blog_post->title }}",
    "datePublished": "{{ $blog_post->online_at }}",
    "dateModified": "{{ $blog_post->updated_at }}",
    "description": "{{ $blog_post->excerpt }}",
    "author": {
      "@type": "Person",
      "name": "{{ $blog_post->user->name }}"
    },
    "publisher": {
      "@type": "Organization",
      "name": ""
    },
    "image": {
      "@type": "ImageObject",
      "url": "",
      "height": "",
      "width": ""
    }
  }
</script>
@endsection

@section('amp_components')
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
@endsection

@section('content')
<div class="blog-post--post">
  <article class="blog-post" data-id="{{ $blog_post->id }}">
    <header class="blog-post--header">
      <h1 class="blog-post--title">{{ $blog_post->title }}</h1>
      <time class="blog-post--time"
        datetime="{{ $blog_post->online_at }}">
        {{ $blog_post->online_at }}
      </time>
    </header>
    <section class="blog-post--excerpt">
      <p>{{ $blog_post->excerpt }}</p>
    </section>
    <section class="blog-post--content">
      {{ $blog_post->content }}
    </section>
  </article>
</div>
<div class="blog-post--sidebar">
  <amp-list
    width="auto"
    height="140"
    layout="fixed-height"
    src="/api/latest-blogposts/">
    <template type="amp-mustache">
      <div class="link-entry" data-vars-article-id="">
        <a href="@{{url}}">@{{title}}</a>
      </div>
    </template>
  </amp-list>
</div>
@endsection

@section('custom_scripts')
<amp-analytics>
  <script type="application/json">
    {
      "requests": {
        "pageview": "/api/tracker/RANDOM/?event=${eventName}&id=${elementId}&type=${elementType}",
        "error": "/api/errors/RANDOM/"
      },
      "triggers": {
        "trackPageview": {
          "on": "visible",
          "request": "pageview",
          "vars": {
            "eventName": "pageview",
            "elementId": "{{ $blog_post->id }}",
            "elementType": "BlogPost"
          }
        },
        "trackClick": {
          "on": "click",
          "request": "pageview",
          "selector": "[data-vars-article-id]",
          "vars": {
            "eventName": "clickevent",
            "elementId": "${articleId}",
            "elementType": "BlogPost"
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