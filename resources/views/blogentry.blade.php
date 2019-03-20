@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--8-col blog_entry mdl-card">
            <div class="mdl-card__title">
                <h1>{{ $title }}</h1>
            </div>
            <div class="mdl-card__supporting-text">
                <p>{{ $content }}</p>
                <div>
                    @foreach ($categories as $category)
                        <span class="mdl-chip">
                            <a href="/category/{{ $category->slug }}" class="mdl-chip__text">{{ $category->name }}</a>
                        </span>
                    @endforeach
                </div>
            </div>
            <div class="mdl-card__supporting-text">
                <relatedblogentrylist initialid="{{ $id }}" />
            </div>
        </div>
    </div>
@endsection
