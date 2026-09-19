<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return response()->json(Question::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'question_text' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:A,B,C,D',
        ]);

        $question = Question::create($validated);

        return response()->json($question, 201);
    }

    public function show(string $id)
    {
        $question = Question::findOrFail($id);

        return response()->json($question);
    }

    public function update(Request $request, string $id)
    {
        $question = Question::findOrFail($id);

        $validated = $request->validate([
            'quiz_id' => 'sometimes|exists:quizzes,id',
            'question_text' => 'sometimes|string',
            'option_a' => 'sometimes|string',
            'option_b' => 'sometimes|string',
            'option_c' => 'sometimes|string',
            'option_d' => 'sometimes|string',
            'correct_answer' => 'sometimes|in:A,B,C,D',
        ]);

        $question->update($validated);

        return response()->json($question);
    }

    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);

        $question->delete();

        return response()->json([
            'message' => 'Question deleted successfully.'
        ]);
    }
}