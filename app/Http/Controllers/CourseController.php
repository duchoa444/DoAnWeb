<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::query()
            ->with(['category:id,name', 'teacher:id,name'])
            ->withCount('lessons')
            ->whereIn('status', ['published', 'public'])
            ->latest()
            ->paginate(12);

        return view('courses.index', compact('courses'));
    }
}
