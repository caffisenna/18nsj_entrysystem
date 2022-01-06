<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        // admin
        Gate::define('admin', function (\App\Models\User $user) {
            return $user->is_admin;
        });

        // commi
        Gate::define('commi', function (\App\Models\User $user) {
            return $user->is_commi;
        });

        // staff
        Gate::define('staff', function (\App\Models\User $user) {
            return $user->is_staff;
        });
    }
}
