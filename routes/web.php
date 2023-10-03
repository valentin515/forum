<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('/', '/questions', 301);
Route::get("/questions", [QuestionController::class, "index"])->name("questions");
Route::get("/questions/{question}", [QuestionController::class, "show"])->whereNumber('question')->name("questions.show");

Route::middleware('guest')->group(function() {

    Route::get("/login", [LoginController::class, "index"])->name("login");
    Route::post("/login", [LoginController::class, "store"])->name("login.store");

    Route::get("/register", [RegisterController::class, "index"])->name("register");
    Route::post("/register", [RegisterController::class, "store"])->name("register.store"); 

});

Route::post("/logout", [LoginController::class, "destroy"])->middleware('auth')->name("logout");


