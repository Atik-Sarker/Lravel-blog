<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
     function boot()
    {
        $this->registerPolicies();

        Gate::resource('post', 'App\Policies\PostPolicy');

//        Gate::resource('role', 'App\Policies\RolePolicy');

        Gate::define('post.tag', 'App\Policies\PostPolicy@tag');
        Gate::define('post.category', 'App\Policies\PostPolicy@category');


    }
}
