@extends('layouts.auth')

@section('auth.content')
<a class="text-decoration-none" href="{{route('questions')}}">Go home</a>
<div class="d-flex justify-content-between align-items-center">
    <x-h1>Registration</x-h1>
    <a class="text-decoration-none" href="{{route('login')}}">Login</a>
</div>
<x-form novalidate action="{{route('register.store')}}">
    <x-form-item>
        <label class="">Nickname</label>
        <span class="text-muted d-block mb-2">The nickname contains characters (A–Z, a-z), digits (0-9) and no spaces</span>
        <x-error name="nickname"/>
        <x-input name="nickname" placeholder="Nickname"/>
    </x-form-item>
    <x-form-item>
        <label class="">Email</label>
        <x-error name="email"/>
        <x-input type="email" name="email" placeholder="Email"/>
    </x-form-item>
    <x-form-item>
        <label class="">Password</label>
        <span class="text-muted d-block mb-2">The password contains characters (A–Z, a-z), digits (0-9) and !@#%^&.-/?+_=*(){}:`;,| <br> Minimum 8 characters</span>
        <x-error name="password"/>
        <x-input type="password" name="password" placeholder="Password"/>
    </x-form-item>
    <x-form-item>
        <label class="">Password confirm</label>
        <x-input type="password" name="password_confirmation" placeholder="Password confirm"/>
    </x-form-item>
    <x-button class="mt-2">Submit</x-button>
</x-form>
@endsection

