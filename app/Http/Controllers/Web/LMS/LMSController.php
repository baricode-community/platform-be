<?php

namespace App\Http\Controllers\Web\LMS;

use App\Http\Controllers\Controller;
use App\Models\LMS\Course;
use Illuminate\Http\Request;

class LMSController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $courses = Course::with(['categories.lessons' => function ($query) {
            $query->where('is_published', true)->orderBy('order');
        }])
            ->where('is_published', true)
            ->take(5)
            ->inRandomOrder()
            ->get();
        
        return view('pages.lms.index', compact('user', 'courses'));
    }

    public function course(Course $course)
    {
        $user = auth()->user();
        $categories = $course->categories()
            ->where('is_published', true)
            ->orderBy('order')
            ->with(['lessons' => function ($query) {
                $query->where('is_published', true)->orderBy('order');
            }])
            ->get();
        
        return view('pages.lms.course', compact('user', 'course', 'categories'));
    }
}
