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

@section('amp_custom_styles')
<style amp-custom>

</style>
@endsection

@section('amp_components')
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
@endsection

@section('content')
@foreach ($blog_posts as $post)
<article class="blog-post">
  <h1 class="blog-post-title">
    <a href="/post/<?= $post->slug ?>/"><?= $post->title ?></a>
  </h1>
  <p class="blog-post-excerpt"><?= $post->excerpt ?></p>
</article>
@endforeach
@endsection
