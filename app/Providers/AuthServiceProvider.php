<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('super-admin', fn(User $user) => in_array($user->email, ['gsp_temp_2@gmail.com']));
        Gate::define('admin', fn(User $user) => in_array($user->email, ['gsp_temp_2@gmail.com', 'almamun.ilias@czm-bd.org', 'rakibul@czm-bd.org']));
    }
}
