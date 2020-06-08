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
<script async custom-element="amp-date-display" src="https://cdn.ampproject.org/v0/amp-date-display-0.1.js"></script>
<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
@endsection

@section('content')
<article class="blog-post" data-id="{{ $blog_post->id }}">
  <header class="blog-post--header">
    <h1 class="blog-post--title">{{ $blog_post->title }}</h1>
    <amp-date-display
      datetime="{{ $blog_post->online_at }}"
      layout="fixed"
      width="200"
      height="50">
      <template type="amp-mustache">
        <time class="blog-post--time">@{{day}} @{{monthName}} @{{year}}</time>
      </template>
    </amp-date-display>
  </header>
  <section class="blog-post--excerpt">
    <p>{{ $blog_post->excerpt }}</p>
  </section>
  <section class="blog-post--content">
    {{ $blog_post->content }}
  </section>
  <section class="blog-post--related">
    <amp-list
      width="auto"
      height="140"
      layout="fixed-height"
      src="/api/blogpost/{{ $blog_post->id }}/prevnext">
      <template type="amp-mustache">
        <div class="image-entry">
          <amp-img src="@{{imageUrl}}" width="100" height="75"></amp-img>
          <a href="@{{url}}">@{{title}}</a>
        </div>
      </template>
    </amp-list>
  </section>
</article>
<aside class="blog-aside">
  
</aside>
@endsection