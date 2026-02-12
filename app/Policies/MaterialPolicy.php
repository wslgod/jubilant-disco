<?php

namespace App\Policies;

use App\Models\Material;
use App\Models\User;
use App\Services\SubscriptionService;

class MaterialPolicy
{
    public function view(User $user, Material $material): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return app(SubscriptionService::class)->hasActiveSubscription($user) && $material->is_published;
    }

    public function accessAdmin(User $user): bool
    {
        return $user->isAdmin();
    }
}
