@extends('layouts.base')


@section('content')
    <section>
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-3">
                @yield('auth.content')    
            </div>
        </div>
    </section>
@endsection
