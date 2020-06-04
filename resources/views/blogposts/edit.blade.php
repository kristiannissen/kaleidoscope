@extends('layouts.backend')

@section('title', 'Edit Blog Post')

@section('content')
  <div class="mdl-grid">
    <form action="/blogposts/" method="post" autocomplete="off">
      @csrf
      @method('PUT')
      @include('blogposts.fields', array('blog_post' => $blog_post))
    </form>
  </div>
@endsection
