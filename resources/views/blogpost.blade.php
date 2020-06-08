@extends('layouts.storefront')

@section('title', $blog_post->title)

@section('amp_ld_json')
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage": "{{ $blog_post_url }}",
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

@section('amp_custom_styles')
<style amp-custom>

</style>
@endsection

@section('amp_components')
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
@endsection

@section('content')
<article class="blog-post">
  <amp-img src="{{ $blog_post->theme_image }}"
    width="800" height="400" layout="responsive" alt="{{ $blog_post->title }}"></amp-img>
  <header class="blog-post-header">
    <h1>{{ $blog_post->title }}</h1>
  </header>
  <section class="blog-post-excerpt">
    <p>{{ $blog_post->excerpt }}</p>
  </section>
  <section class="blog-post-content">
    <p>{{ $blog_post->content }}</p>
  </section>
  <section class="blog-post-related">
    <amp-list
      width="auto"
      height="140"
      layout="fixed-height"
      src="/api/blogpost/{{ $blog_post->id }}/prevnext">
      <template type="amp-mustache">
        <div class="image-entry">
          <amp-img src="@{{imageUrl}}" width="100" height="75"></amp-img>
          <span>@{{title}}</span>
        </div>
      </template>
    </amp-list>
  </section>
</article>
@endsection