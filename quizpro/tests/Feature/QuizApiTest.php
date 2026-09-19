<?php

namespace Tests\Feature;

use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_quiz(): void
    {
        $response = $this->postJson('/api/quizzes', [
            'title' => 'Test Quiz',
            'description' => 'Automated test quiz',
            'duration_minutes' => 10,
            'is_active' => true,
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('quizzes', [
            'title' => 'Test Quiz',
        ]);
    }

    public function test_can_get_all_quizzes(): void
    {
        Quiz::create([
            'title' => 'Existing Quiz',
            'description' => 'Quiz for testing',
            'duration_minutes' => 15,
            'is_active' => true,
        ]);

        $response = $this->getJson('/api/quizzes');

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'title' => 'Existing Quiz',
        ]);
    }
}
