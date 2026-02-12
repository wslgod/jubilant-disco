<?php

namespace App\Services;

use App\Models\Material;
use App\Models\MaterialAccessLog;
use App\Models\User;
use Illuminate\Http\Request;

class MaterialAccessService
{
    public function log(User $user, Material $material, Request $request): void
    {
        MaterialAccessLog::create([
            'user_id' => $user->id,
            'material_id' => $material->id,
            'accessed_at' => now(),
            'ip_address' => $request->ip(),
        ]);
    }
}
