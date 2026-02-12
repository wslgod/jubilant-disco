<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;

class SubscriptionManagementController extends Controller
{
    public function index()
    {
        return view('admin.subscriptions.index', [
            'subscriptions' => Subscription::with('user')->latest()->paginate(20),
        ]);
    }
}
