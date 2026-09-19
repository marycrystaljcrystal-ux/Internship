<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\QuestionController;

Route::apiResource('quizzes', QuizController::class);
Route::apiResource('questions', QuestionController::class);