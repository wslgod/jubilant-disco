<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Carbon;

class SubscriptionService
{
    public function hasActiveSubscription(User $user): bool
    {
        $subscription = $user->activeSubscription;

        return $subscription !== null
            && $subscription->status === 'active'
            && $subscription->expires_at instanceof Carbon
            && $subscription->expires_at->isFuture();
    }
}
