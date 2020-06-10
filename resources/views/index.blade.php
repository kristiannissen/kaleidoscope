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
<script async custom-element="amp-script" src="https://cdn.ampproject.org/v0/amp-script-0.1.js"></script>
@endsection

@section('content')
<div class="site-content--blogposts">
  @foreach ($blog_posts as $post)
    @if($loop->first)
      <article class="blog-post blog-post--first blog-post--index-{{ $loop->index }}"
        data-vars-article-id="{{ $post->id }}">
        <header class="blog-post--header">
          <amp-img src="/photo-of-men-having-conversation-935949.jpg"
            alt="Welcome" width="375" height="210"
            layout="responsive">
          </amp-img>
          <h1 class="blog-post--title">
            <a href="/post/{{ $post->slug }}/">{{ $post->title }}</a>
          </h1>
          <amp-script layout="container"
            src="{{ asset('/js/tolocaledate.js') }}"
            width="190"
            height="20">
            <time class="blog-post--time"
              datetime="{{ $post->online_at }}">
              {{ $post->online_at }}
            </time>
          </amp-script>
        </header>
        <section class="blog-post--excerpt">
          <p>{{ $post->excerpt }}</p>
        </section>
        <div class="blog-post--readmore">
          <a href="/post/{{ $post->slug }}/">Read more</a>
        </div>
      </article>
    @elseif($loop->last)
    <article class="blog-post blog-post--last blog-post--index-{{ $loop->index }}" data-vars-article-id="{{ $post->id }}">
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
        <p>{{ $post->excerpt }}</p>
      </section>
      <div class="blog-post--readmore">
        <a href="/post/{{ $post->slug }}/">Read more</a>
      </div>
    </article>
    @else
      <article class="blog-post blog-post--index-{{ $loop->index }}"
        data-vars-article-id="{{ $post->id }}">
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
          <p>{{ $post->excerpt }}</p>
        </section>
        <div class="blog-post--readmore">
          <a href="/post/{{ $post->slug }}/">Read more</a>
        </div>
      </article>
    @endif
  @endforeach
</div>
<div class="site-content--sidebar">
  <div class="card">
    <div class="card--title">
      <h2>Latest Blog Posts</h2>
    </div>
    <div class="card--content">
      <amp-list
        width="200"
        height="200"
        layout="responsive"
        src="/api/latest-blogposts/">
        <template type="amp-mustache">
          <article class="list--item" data-vars-article-id="@{{id}}">
            <time datetime="@{{ published }}">@{{ published }}</time><a href="@{{ url }}">@{{ title }}</a>
          </article>
        </template>
        <div overflow class="list--overflow">See more</div>
      </amp-list>
    </div>
    <div class="card--footer">
      hello kitty
    </div>
  </div>
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
            "elementType": "IndexPage"
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