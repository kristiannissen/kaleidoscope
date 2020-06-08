@extends('layouts.backend')

@section('title', 'Create Blog Post')

@section('custom_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endsection

@section('content')
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--8-col">
      <form action="/admin/blogposts/" method="post" autocomplete="off">
        @csrf
        @include('blogposts.fields', array('blog_post' => $blog_post))
      </form>
    </div>
    <div class="mdl-cell mdl-cell--4-col"></div>
  </div>
@endsection
