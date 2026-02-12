<?php

namespace App\Http\Middleware;

use App\Services\SubscriptionService;
use Closure;
use Illuminate\Http\Request;

class CheckSubscription
{
    public function __construct(private readonly SubscriptionService $subscriptionService)
    {
    }

    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && ! $user->isAdmin() && ! $this->subscriptionService->hasActiveSubscription($user)) {
            return redirect()->route('account.show')->withErrors([
                'subscription' => 'Sua assinatura está inativa ou expirada. Escolha um plano para continuar.',
            ]);
        }

        return $next($request);
    }
}
