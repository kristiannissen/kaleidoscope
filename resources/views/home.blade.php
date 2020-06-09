@extends('layouts.storefront')

@section('title', 'Hello Kitty')

@section('amp_ld_json')
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "headline": "Home Page",
    "datePublished": "2015-10-07T12:02:41Z",
    "image": [
      "logo.jpg"
    ]
  }
</script>
@endsection

@section('amp_components')
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
<script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
@endsection

@section('content')
<div class="site-content--blogposts">
  @foreach ($blog_posts as $post)
    @if($loop->first)
      <article class="blog-post blog-post--first" data-vars-article-id="{{ $post->id }}">
        <header class="blog-post--header">
          <h1 class="blog-post--title">
            <a href="/post/{{ $post->slug }}/">{{ $post->title }}</a>
          </h1>
          <time class="blog-post--time"
            datetime="{{ $post->online_at }}">
            {{ $post->online_at }}
          </time>
        </header>
        <section class="blog-post--excerpt">
          <p class="blog-post--excerpt">{{ $post->excerpt }}</p>
        </section>
        <div class="blog-post--readmore">
          <a href="/post/{{ $post->slug }}/">Read more</a>
        </div>
      </article>
    @elseif($loop->last)
    <article class="blog-post blog-post--last" data-vars-article-id="{{ $post->id }}">
      <header class="blog-post--header">
        <h1 class="blog-post--title">
          <a href="/post/{{ $post->slug }}/">{{ $post->title }}</a>
        </h1>
        <time class="blog-post--time"
          datetime="{{ $post->online_at }}">
          {{ $post->online_at }}
        </time>
      </header>
      <section class="blog-post--excerpt">
        <p class="blog-post--excerpt">{{ $post->excerpt }}</p>
      </section>
      <div class="blog-post--readmore">
        <a href="/post/{{ $post->slug }}/">Read more</a>
      </div>
    </article>
    @else
      <article class="blog-post" data-vars-article-id="{{ $post->id }}">
        <header class="blog-post--header">
          <h1 class="blog-post--title">
            <a href="/post/{{ $post->slug }}/">{{ $post->title }}</a>
          </h1>
          <time class="blog-post--time"
            datetime="{{ $post->online_at }}">
            {{ $post->online_at }}
          </time>
        </header>
        <section class="blog-post--excerpt">
          <p class="blog-post--excerpt">{{ $post->excerpt }}</p>
        </section>
        <div class="blog-post--readmore">
          <a href="/post/{{ $post->slug }}/">Read more</a>
        </div>
      </article>
    @endif
  @endforeach
</div>
<div class="site-content--sidebar">
  <amp-list
    width="200"
    height="200"
    layout="responsive"
    src="/api/latest-blogposts/"
  >
    <template type="amp-mustache">
      <article class="" data-vars-article-id="@{{id}}">
        <a href="@{{ url }}">@{{ title }}</a>
      </article>
    </template>
  </amp-list>
</div>
@endsection

@section('custom_scripts')
<amp-analytics>
  <script type="application/json">
    {
      "requests": {
        "pageview": "/api/tracker/RANDOM/?event=${eventName}&id=${elementId}",
        "error": "/api/error/RANDOM/"
      },
      "triggers": {
        "trackPageview": {
          "on": "visible",
          "request": "pageview",
          "vars": {
            "eventName": "pageview",
            "elementId": "0"
          }
        },
        "trackClick": {
          "on": "click",
          "request": "pageview",
          "selector": "[data-vars-article-id]",
          "vars": {
            "eventName": "clickevent",
            "elementId": "${articleId}"
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