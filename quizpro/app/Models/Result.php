<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'quiz_id',
        'student_name',
        'score',
        'total_questions',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}