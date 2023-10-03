<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
    public function index(Request $request)
    {

        $questions = Question::query()->latest('created_at')->paginate(10, ['id', 'title', 'created_at', 'user_id']);

        return view('questions.index', compact('questions'));
    }

    public function show(Request $request)
    {
        
        $question = Question::findOrFail($request->question, ['id', 'title', 'content', 'created_at', 'user_id']);

        return view('questions.show', compact('question')); 
    }
}
