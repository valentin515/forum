<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Request $request)
    {

        $validated = validator(['question' => $request->question, 'content' => $request->content], [
            'question' => ['required', 'integer'],
            'content' => ['required', 'string', 'max: 10000'],
        ])->validate();

  
        try {
        
            Answer::create([
                'user_id' => Auth::id(),
                'question_id' => $validated['question'],
                'content' => $validated['content'],
            ]);
            
        } catch(Exception $e) {

           return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['createError' => 'Something went wrong']);
        }

        return redirect()->back();
                    
    }
}
