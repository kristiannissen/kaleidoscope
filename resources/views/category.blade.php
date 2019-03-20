@extends('layouts.app')

@section('title', $name)

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--8-col blog_entry mdl-card">
            <div class="mdl-card__title">
                <h1>{{ $name }}</h1>
            </div>
            <div class="mdl-card__supporting-text">
                <p>
                    {{ $description }}
                </p>
            </div>
            <div class="mdl-card__supporting-text">
                <category-paginator initialid="{{ $id }}" />
            </div>
        </div>
    </div>
@endsection
