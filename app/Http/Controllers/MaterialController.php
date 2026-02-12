<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Services\MaterialAccessService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class MaterialController extends Controller
{
    public function __construct(private readonly MaterialAccessService $accessService)
    {
    }

    public function index()
    {
        $materials = Material::query()->where('is_published', true)->with('topic.subject')->latest()->paginate(12);

        return view('materials.index', compact('materials'));
    }

    public function show(Material $material)
    {
        $this->authorize('view', $material);

        $temporaryUrl = $material->type === 'pdf'
            ? URL::temporarySignedRoute('materials.stream', now()->addMinutes(20), ['material' => $material->id])
            : null;

        return view('materials.show', compact('material', 'temporaryUrl'));
    }

    public function stream(Request $request, Material $material)
    {
        $this->authorize('view', $material);

        abort_if($material->type !== 'pdf' || ! $material->file_path, 404);

        $this->accessService->log($request->user(), $material, $request);

        return Storage::disk('private_materials')->response($material->file_path, $material->file_name, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$material->file_name.'"',
            'Cache-Control' => 'private, no-store, no-cache, must-revalidate',
        ]);
    }
}
