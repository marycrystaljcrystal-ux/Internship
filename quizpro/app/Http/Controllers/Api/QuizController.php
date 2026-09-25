<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of quizzes.
     */
    public function index()
    {
        return response()->json(Quiz::all());
    }

    /**
     * Store a newly created quiz.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_minutes' => 'required|integer|min:1',
            'is_active' => 'boolean',
        ]);

        $quiz = Quiz::create($validated);

        return response()->json($quiz, 201);
    }

    /**
     * Display the specified quiz.
     */
    public function show(string $id)
    {
        $quiz = Quiz::findOrFail($id);

        return response()->json($quiz);
    }

    /**
     * Update the specified quiz.
     */
    public function update(Request $request, string $id)
    {
        $quiz = Quiz::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'duration_minutes' => 'sometimes|integer|min:1',
            'is_active' => 'boolean',
        ]);

        $quiz->update($validated);

        return response()->json($quiz);
    }

    /**
     * Remove the specified quiz.
     */
    public function destroy(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return response()->json([
            'message' => 'Quiz deleted successfully.'
        ]);
    }
}