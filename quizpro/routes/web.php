<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/quizzes', function () {
    return view('quizzes');
});

Route::get('/quiz/1', function () {
    return view('quiz');
});
