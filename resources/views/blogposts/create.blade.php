@extends('layouts.backend')

@section('title', 'Create Blog Post')

@section('content')
  <div class="mdl-grid">
    <form action="/blogposts/" method="post" autocomplete="off">
      @csrf
      @include('blogposts.fields', array('blog_post' => $blog_post))
    </form>
  </div>
@endsection
