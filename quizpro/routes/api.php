<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\ResultController;

Route::apiResource('quizzes', QuizController::class);
Route::apiResource('questions', QuestionController::class);

Route::apiResource('results', ResultController::class)->only([
    'index',
    'store',
    'show',
    'update',
    'destroy',
]);