<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        return response()->json(Result::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'student_name' => 'required|string',
            'score' => 'required|integer|min:0',
            'total_questions' => 'required|integer|min:1',
        ]);

        $result = Result::create($validated);

        return response()->json($result, 201);
    }

    public function show(string $id)
    {
        $result = Result::findOrFail($id);

        return response()->json($result);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'student_name' => 'required|string',
            'score' => 'required|integer|min:0',
            'total_questions' => 'required|integer|min:1',
        ]);

        $result = Result::findOrFail($id);

        $result->update($validated);

        return response()->json($result);
    }

    public function destroy(string $id)
    {
        $result = Result::findOrFail($id);

        $result->delete();

        return response()->json([
            'message' => 'Result deleted successfully.'
        ]);
    }
}