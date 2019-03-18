@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--8-col">
            <article>
                <header>
                    <h1>{{ $title }}</h1>
                </header>
                <p>
                    {{ $content }}
                </p>
            </article>
        </div>
        <div class="mdl-cell mdl-cell--4-col">here</div>
    </div>
@endsection
