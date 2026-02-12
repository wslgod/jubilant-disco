<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectManagementController extends Controller
{
    public function index()
    {
        return view('admin.subjects.index', ['subjects' => Subject::latest()->paginate(15)]);
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        Subject::create($request->validate([
            'name' => ['required', 'max:120'],
            'description' => ['nullable', 'string'],
        ]));

        return redirect()->route('admin.subjects.index');
    }

    public function edit(Subject $subject)
    {
        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->validate([
            'name' => ['required', 'max:120'],
            'description' => ['nullable', 'string'],
        ]));

        return redirect()->route('admin.subjects.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return back();
    }
}
