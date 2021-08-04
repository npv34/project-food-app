<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
        Gate::define('crud-user', function () {
            // code logic
            $userLogin = Auth::user();
            foreach ($userLogin->roles as $role) {
                if ($role->name == 'Admin' || $role->name == 'User') {
                    return true;
                }
            }

            return false;
        });


        Gate::define('crud-post', function () {
            $userLogin = Auth::user();
            return $userLogin->isAdmin();
        });


        //
    }
}
