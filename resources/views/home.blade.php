@extends('layouts.app')

@section('title', 'Hello Kitty')

@section('content')
   <div class="mdl_grid blogentries" id="app">
        <div class="mdl-card mdl-cell mdl-cell--8-col">
            <div class="mdl-card__title">
                <h3>Hello Kitty</h3>
            </div>
            <div class="mdl-card__supporting-text">
                <blogentrylist />
            </div>
            <div class="mdl-card__supporting-text">meta</div>
        </div>
    </div>
@endsection
