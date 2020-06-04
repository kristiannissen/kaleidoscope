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

@section('content')
@foreach ($blog_posts as $post)
<article>
  <h1>
    <a href="/post/<?= $post->slug ?>/"><?= $post->title ?></a>
  </h1>
</article>
@endforeach
@endsection
