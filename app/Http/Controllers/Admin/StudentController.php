<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        return view('admin.students.index', [
            'students' => User::where('role', 'student')->latest()->paginate(20),
        ]);
    }

    public function toggleStatus(User $user)
    {
        $user->update(['status' => ! $user->status]);

        return back();
    }
}
