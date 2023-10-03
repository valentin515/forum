<?php

use App\Http\Controllers\User\AnswerController;
use App\Http\Controllers\User\QuestionController;
use Illuminate\Support\Facades\Route;

Route::prefix("user")->middleware('auth')->group(function() {

    Route::redirect('/', '/user/questions', 301);
    Route::get("/questions", [QuestionController::class, "index"])->name("user.questions");
    Route::get("/questions/create", [QuestionController::class, "create"])->name("user.questions.create");
    Route::get("/questions/{question}", [QuestionController::class, "show"])->whereNumber('question')->name("user.questions.show");
    Route::post("/questions", [QuestionController::class, "store"])->name("user.questions.store");
    Route::post("/questions/{question}/answers", [AnswerController::class, "store"])->name("user.questions.answers.store");
});