@extends('layouts.storefront')

@section('title', 'Hello Kitty')

@section('amp_ld_json')
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "headline": "Open-source framework for publishing content",
    "datePublished": "2015-10-07T12:02:41Z",
    "image": [
      "logo.jpg"
    ]
  }
</script>
@endsection

@section('amp_components')
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<script async custom-element="amp-date-display" src="https://cdn.ampproject.org/v0/amp-date-display-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
@endsection

@section('content')
@foreach ($blog_posts as $post)
  @if($loop->first)
    <article class="blog-post blog-post--first" data-id="{{ $post->id }}">
        <h1 class="blog-post--title">
          <a href="/post/{{ $post->slug }}/">{{ $post->title }}</a>
        </h1>
        <time class="blog-post--time"
          datetime="{{ $post->online_at }}">
          {{ $post->online_at }}
        </time>
      <p class="blog-post--excerpt">{{ $post->excerpt }}</p>
      <div class="blog-post--readmore">
        <a href="/post/{{ $post->slug }}">Read more</a>
      </div>
    </article>
  @elseif($loop->last)
  <article class="blog-post blog-post--last" data-id="{{ $post->id }}">
    <h1 class="blog-post--title">
      <a href="/post/{{ $post->slug }}/">{{ $post->title }}</a>
    </h1>
    <time class="blog-post--time"
      datetime="{{ $post->online_at }}">
      {{ $post->online_at }}
    </time>
    <p class="blog-post--excerpt">{{ $post->excerpt }}</p>
    <div class="blog-post--readmore">
      <a href="/post/{{ $post->slug }}">Read more</a>
    </div>
  </article>
  @else
    <article class="blog-post" data-id="{{ $post->id }}">
      <h1 class="blog-post--title">
        <a href="/post/{{ $post->slug }}/">{{ $post->title }}</a>
      </h1>
      <time class="blog-post--time"
        datetime="{{ $post->online_at }}">
        {{ $post->online_at }}
      </time>
      <p class="blog-post--excerpt">{{ $post->excerpt }}</p>
      <div class="blog-post--readmore">
        <a href="/post/{{ $post->slug }}">Read more</a>
      </div>
    </article>
  @endif
@endforeach
@endsection
