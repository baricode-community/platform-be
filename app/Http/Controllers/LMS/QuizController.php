<?php

namespace App\Http\Controllers\LMS;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::withCount('questions')
            ->where('is_active', true)
            ->latest()
            ->get();

        return view('pages.lms.quiz.index', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        if (! $quiz->is_active) {
            abort(404);
        }

        $quiz->load(['questions.options']);

        return view('pages.lms.quiz.show', compact('quiz'));
    }
}
