<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot(): void {
        $this->registerPolicies();

        Gate::define('edit-users', function ($user) {
            return $user->is_admin == 1;
        });
        
        Gate::define('no-admin', function ($user) {
            return $user->is_admin == 0;
        });
    }
}
