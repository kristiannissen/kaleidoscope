@extends('layouts.backend')

@section('title', 'Blog Posts')

@section('content')
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
      <ul class="mdl-list">
      @foreach($blog_posts as $post)
        <li class="mdl-list__item mdl-list__item--two-line">
          <span class="mdl-list__item-primary-content">
            <span>{{ $post->title }}</span>
            <span class="mdl-list__item-sub-title">{{ $post->excerpt }}</span>
          </span>
          <span class="mdl-list__item-secondary-action">
            <a href="/blogposts/{{ $post->id }}/edit" class="">
              <i class="material-icons mdl-list__item-icon">edit</i>
            </a>
          </span>
        </li>
      @endforeach
      </ul>
    </div>
    <div class="mdl-cell mdl-cell--12-col" id="app">
      {{ $blog_posts->links() }}
    </div>
  </div>
@endsection
