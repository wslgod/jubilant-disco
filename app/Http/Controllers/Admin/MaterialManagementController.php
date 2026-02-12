<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialManagementController extends Controller
{
    public function index()
    {
        return view('admin.materials.index', ['materials' => Material::with('topic.subject')->latest()->paginate(15)]);
    }

    public function create()
    {
        return view('admin.materials.create', ['topics' => Topic::with('subject')->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'topic_id' => ['required', 'exists:topics,id'],
            'title' => ['required', 'max:150'],
            'type' => ['required', 'in:pdf,resumo'],
            'summary_content' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'mimes:pdf'],
            'is_published' => ['sometimes', 'boolean'],
        ]);

        if ($data['type'] === 'pdf' && $request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('', 'private_materials');
            $data['file_name'] = $request->file('file')->getClientOriginalName();
        }

        $data['uploaded_by'] = $request->user()->id;
        $data['is_published'] = $request->boolean('is_published');

        Material::create($data);

        return redirect()->route('admin.materials.index');
    }

    public function edit(Material $material)
    {
        return view('admin.materials.edit', ['material' => $material, 'topics' => Topic::all()]);
    }

    public function update(Request $request, Material $material)
    {
        $data = $request->validate([
            'topic_id' => ['required', 'exists:topics,id'],
            'title' => ['required', 'max:150'],
            'type' => ['required', 'in:pdf,resumo'],
            'summary_content' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'mimes:pdf'],
            'is_published' => ['sometimes', 'boolean'],
        ]);

        if ($data['type'] === 'pdf' && $request->hasFile('file')) {
            if ($material->file_path) {
                Storage::disk('private_materials')->delete($material->file_path);
            }
            $data['file_path'] = $request->file('file')->store('', 'private_materials');
            $data['file_name'] = $request->file('file')->getClientOriginalName();
        }

        $data['is_published'] = $request->boolean('is_published');

        $material->update($data);

        return redirect()->route('admin.materials.index');
    }

    public function destroy(Material $material)
    {
        if ($material->file_path) {
            Storage::disk('private_materials')->delete($material->file_path);
        }

        $material->delete();

        return back();
    }
}
