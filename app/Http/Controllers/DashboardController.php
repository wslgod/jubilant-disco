<?php

namespace App\Http\Controllers;

use App\Models\MaterialAccessLog;
use App\Models\Subject;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $recentAccess = MaterialAccessLog::query()
            ->where('user_id', $request->user()->id)
            ->latest('accessed_at')
            ->with('material.topic.subject')
            ->take(5)
            ->get();

        return view('dashboard.index', [
            'subjects' => Subject::withCount('topics')->take(6)->get(),
            'recentAccess' => $recentAccess,
        ]);
    }
}
