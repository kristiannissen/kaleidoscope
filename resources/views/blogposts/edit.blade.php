@extends('layouts.backend')

@section('title', 'Edit Blog Post')

@section('custom_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endsection
@section('custom_js')
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
@endsection

@section('custom_scripts')
<script>
var simplemde = new SimpleMDE({
  element: document.getElementById("field_content")
});
</script>
@endsection

@section('content')
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--8-col">
      <form action="{{ url('blogposts', ['id' => $blog_post->id]) }}" method="post" autocomplete="off">
        @csrf
        @method('PUT')
        @include('blogposts.fields', array('blog_post' => $blog_post))
      </form>
    </div>
    <div class="mdl-cell mdl-cell--4-col">
      <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">Activity</h2>
          </div>
          <div class="mdl-card__supporting-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenan convallis.
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <a href="/blogposts/{{ $blog_post->id }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
              View Updates
            </a>
          </div>
      </div>
      <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">Markdown Formatting</h2>
          </div>
          <div class="mdl-card__supporting-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenan convallis.
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <a href="/blogposts/{{ $blog_post->id }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
              View Updates
            </a>
          </div>
      </div>
    </div>
  </div>
@endsection
