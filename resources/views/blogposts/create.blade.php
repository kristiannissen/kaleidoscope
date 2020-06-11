@extends('layouts.backend')

@section('title', 'New Blog Post')

@section('custom_css')
<style>
  textarea {
    outline: none;
  }
</style>
@endsection

@section('content')
  <div class="mdl-grid" id="app">
    <div class="mdl-cell mdl-cell--8-col">
      <form action="{{ url('admin/blogposts') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @include('blogposts.fields', array('blog_post' => $blog_post))
      </form>
    </div>
    <div class="mdl-cell mdl-cell--4-col">
      <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Activity</h2>
          </div>
          <div class="mdl-card__supporting-text">
            <activity-stream blogid="{{ $blog_post->id }}"></activity-stream>
          </div>          
      </div>
      <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">Markdown Formatting</h2>
          </div>
          <div class="mdl-card__supporting-text">
            
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

@section('custom_scripts')
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script>
  var fileTemplate = document.querySelector('.file_template'),
    rootElm = document.getElementById('blog_files');
  if (fileTemplate) {
    document.getElementById('clone_file_field')
      .addEventListener('click', function(event) {
        event.preventDefault();
        rootElm.append(fileTemplate.cloneNode(true));
      })
  }
</script>
@endsection