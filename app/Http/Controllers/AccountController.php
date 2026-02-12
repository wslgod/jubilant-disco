<?php

namespace App\Http\Controllers;

class AccountController extends Controller
{
    public function show()
    {
        $subscription = auth()->user()->activeSubscription;

        return view('account.show', compact('subscription'));
    }
}
