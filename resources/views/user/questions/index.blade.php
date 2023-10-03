@extends('layouts.main')

@section('main.content')

<section>
    <div class="container">
        <x-h1 class="mb-3">My questions</x-h1>
        @if($questions->items())
        <x-table>
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Question</th>
                <th scope="col">Answers</th>
              </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
              <tr>
                <td>{{$question->created_at->format('d M Y H:i')}}</td>
                <td><a class="text-decoration-none" href="{{route('user.questions.show', $question->id)}}">{{$question->title}}</a></td>
                <td>{{$question->answers()->count()}}</td>
              </tr>
              @endforeach
            </tbody>
          </x-table>
            {{$questions->links()}}
        @else    
            <p class="fs-5">No questions</p>       
        @endif
    </div>
</section>
@endsection

