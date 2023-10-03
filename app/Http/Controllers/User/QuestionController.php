<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{
    public function index(Request $request)
    {
   
        $questions = Question::query()
                            ->where('user_id', Auth::id())
                            ->latest('created_at')
                            ->paginate(10, ['id', 'title', 'created_at']);

        return view('user.questions.index', compact('questions'));
    }

    public function create(Request $request)
    {
        return view('user.questions.create');
    }

    public function store(Request $request)
    {
        $validated = validator($request->all(), [
            'title' => ['required', 'string', 'max:200', 'unique:questions'],
            'content' => ['required', 'string', 'max: 10000'],
        ])->validate();

        Question::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('user.questions');

    }

    public function show(Request $request)
    {
        
        $question = Question::where('user_id', Auth::id())->findOrFail($request->question, ['id', 'title', 'content', 'created_at', 'user_id']);

        return view('user.questions.show', compact('question'));

    }





}
