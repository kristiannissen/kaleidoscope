@extends('layouts.app')

@section('title', 'Hello Kitty')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col">
            <aside>
                <div>
                    aside
                </div>
            </aside>
        </div>
        <div class="mdl-cell mdl-cell--8-col">
            <blogentrylist />
        </div>
        <div class="mdl-cell mdl-cell--2-col"></div>
    </div>
@endsection
