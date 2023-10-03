<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('register.index');
    }

    public function store(Request $request)
    {

        $validated = validator($request->all(), [
            'nickname' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z0-9]+$/u', 'unique:users'],
            'email' => ['required', 'string', 'regex:/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/', 'unique:users'],
            'password' => ['required', 'string', 'min: 8', 'max: 70','regex:/^[a-zA-Z0-9!@#%^&.\-\/?+_=*(){}:`;,|]+$/u', 'confirmed'],
        ])->validate();

        $user = User::create([
            'nickname' => $validated['nickname'],
            'email' => strtolower($validated['email']),
            'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('user.questions');

    }
}
