@extends('layouts.auth')

@section('auth.content')
<a class="text-decoration-none" href="{{route('questions')}}">Go home</a>
<div class="d-flex justify-content-between align-items-center">
    <x-h1>Login</x-h1>
    <a class="text-decoration-none" href="{{route('register')}}">Registration</a>
</div>
<x-error name="loginError"/>
<x-form action="{{route('login.store')}}">
    <x-form-item>
        <label class="">Email</label>
        <x-error name="email"/>
        <x-input type="email" name="email" placeholder="Email"/>
    </x-form-item>
    <x-form-item>
        <label class="">Password</label>
        <x-error name="password"/>
        <x-input type="password" name="password" placeholder="Password"/>
    </x-form-item>
    <x-button class="mt-2">Submit</x-button>
</x-form>
@endsection

