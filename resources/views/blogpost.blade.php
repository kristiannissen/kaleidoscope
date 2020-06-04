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
@endsection

@section('content')
<article>
  <amp-img src="{{ $blog_post->theme_image }}"
    width="800" height="400" layout="responsive" alt="something"></amp-img>
  <header>
    <h1>{{ $blog_post->title }}</h1>
  </header>
  <section>
    <p>{{ $blog_post->content }}</p>
  </section>
</article>
@endsection
