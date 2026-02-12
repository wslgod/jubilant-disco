<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Subject;
use App\Models\Subscription;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'studentsCount' => User::where('role', 'student')->count(),
            'subjectsCount' => Subject::count(),
            'materialsCount' => Material::count(),
            'activeSubscriptions' => Subscription::where('status', 'active')->count(),
        ]);
    }
}
