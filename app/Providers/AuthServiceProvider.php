<?php

namespace App\Providers;

use App\Models\User;
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


        Gate::define('add-new-post', function ($user) {
            // code logic theo role user
            foreach ($user->roles as $role) {
                if ($role->name == "Admin") {
                    return true;
                }
            }
            return false;
        });

        Gate::define('delete-user', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->name == "Admin") {
                    return true;
                }
            }
            return false;
        });
    }
}
