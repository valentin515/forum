@extends('layouts.base')


@section('content')
    <div class="d-flex flex-column justify-content-between min-vh-100">
        @include('components.header')
        <main class="flex-grow-1 py-3">
            @yield('main.content')
        </main>
    </div>
@endsection
