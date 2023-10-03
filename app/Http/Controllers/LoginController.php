<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    public function store(Request $request)
    {

        $validated = validator($request->all(), [
            'email' => ['required', 'string', 'regex:/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/'],
            'password' => ['required', 'string', 'min: 8', 'max: 70','regex:/^[a-zA-Z0-9!@#%^&.\-\/?+_=*(){}:`;,|]+$/u'],
        ])->validate();

   
        if (Auth::attempt($validated)) {

            return redirect()->intended(RouteServiceProvider::HOME);
            
        } else {
            
            throw ValidationException::withMessages([
                'loginError' => 'Incorrect password or email',
            ]);
        }

    }

    public function destroy(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('questions');
    }

}
