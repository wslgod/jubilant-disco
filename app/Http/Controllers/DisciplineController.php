<?php

namespace App\Http\Controllers;

use App\Models\Subject;

class DisciplineController extends Controller
{
    public function index()
    {
        return view('disciplines.index', [
            'subjects' => Subject::with('topics')->get(),
        ]);
    }

    public function show(Subject $subject)
    {
        $subject->load('topics.materials');

        return view('disciplines.show', compact('subject'));
    }
}
