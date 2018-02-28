<?php

namespace App\Providers;

use App\Article;
use App\Permission;
use App\Policies\PermissionPolicy;
use App\Policies\ArticlePolicy;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Permission::class => PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();
        Gate::define('VIEW_ADMIN', function ($user){
            return $user->canDo('VIEW_ADMIN');
        });
        Gate::define('VIEW_ARTICLES', function ($user){
            return $user->canDo('VIEW_ARTICLES');
        });
        Gate::define('EDIT_USERS', function ($user){
            return $user->canDo('EDIT_USERS');
        });


    }
}
