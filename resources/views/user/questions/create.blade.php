@extends('layouts.main')

@section('main.content')

<section>
    <div class="container">
        <div class="col-6">
            <x-h1 class="mb-3">Create a question</x-h1>
            <x-form action="{{route('user.questions.store')}}">
                <x-form-item>
                    <label class="form-label">Title</label>
                    <x-error name="title"/>
                    <x-textarea name="title">{{old('title')}}</x-textarea>    
                </x-form-item>
                <x-form-item>
                    <label class="form-label">Content</label>
                    <x-error name="content"/>
                    <x-textarea name="content" rows="4">{{old('content')}}</x-textarea>    
                </x-form-item>
                <x-button>Send</x-button>
            </x-form>
        </div>
    </div>
</section>
@endsection

