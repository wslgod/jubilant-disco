<?php

namespace App\Providers;

use App\Models\Material;
use App\Policies\MaterialPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Material::class => MaterialPolicy::class,
    ];

    public function boot(): void
    {
        Gate::define('access-admin', [MaterialPolicy::class, 'accessAdmin']);
    }
}
