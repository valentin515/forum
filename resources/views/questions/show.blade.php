@extends('layouts.main')

@section('main.content')

<section>
    <div class="container">
        <div class="col-6">
            <a href="{{route('questions')}}" class="d-block text-decoration-none">Back</a>
            <span class="">{{$question->user->nickname}}</span>
            <span class="text-muted ms-2">{{$question->created_at->format('d M Y H:i')}}</span>
            <x-h1 class="mb-1">{{$question->title}}</x-h1>
            <p class="fs-5">{{$question->content}}</p>
            @auth
                <div class="mb-3">
                    <x-error name="createError"/>
                    <x-form action="{{route('user.questions.answers.store', $question->id)}}">
                        @csrf
                        <x-form-item>
                            <label  class="form-label">Your answer</label>
                            <x-error name="content"/>
                            <x-textarea name="content" rows="2">{{old('content')}}</x-textarea> 
                        </x-form-item>
                        <x-button>Send</x-button>
                    </x-form>
                </div>
            @endauth
            <h3 class="h5">Answers</h3>
            @if($question->answers->isEmpty())
                <p>No answers</p>  
            @else    
                <div>
                    @foreach($question->answers as $answer)
                        <div class="border border-secondary p-2 rounded mb-3">
                            <span class="">{{$answer->user->nickname}}</span><span class="text-muted ms-2">{{$answer->created_at->format('d M Y H:i')}}</span>
                            <p>{{$answer->content}}</p>
                        </div>
                    @endforeach
                </div>         
            @endif
        </div>
    </div>
</section>
@endsection

