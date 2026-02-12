<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicManagementController extends Controller
{
    public function index()
    {
        return view('admin.topics.index', ['topics' => Topic::with('subject')->latest()->paginate(15)]);
    }

    public function create()
    {
        return view('admin.topics.create', ['subjects' => Subject::all()]);
    }

    public function store(Request $request)
    {
        Topic::create($request->validate([
            'subject_id' => ['required', 'exists:subjects,id'],
            'name' => ['required', 'max:120'],
            'description' => ['nullable', 'string'],
        ]));

        return redirect()->route('admin.topics.index');
    }

    public function edit(Topic $topic)
    {
        return view('admin.topics.edit', ['topic' => $topic, 'subjects' => Subject::all()]);
    }

    public function update(Request $request, Topic $topic)
    {
        $topic->update($request->validate([
            'subject_id' => ['required', 'exists:subjects,id'],
            'name' => ['required', 'max:120'],
            'description' => ['nullable', 'string'],
        ]));

        return redirect()->route('admin.topics.index');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return back();
    }
}
