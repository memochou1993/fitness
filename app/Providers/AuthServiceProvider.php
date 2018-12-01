<?php

namespace App\Providers;

use App\UserItem;
use App\Policies\UserItemPolicy;
use Laravel\Passport\Passport;
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
        UserItem::class => UserItemPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes(function ($router) {
            $router->forAccessTokens();
        });

        Passport::tokensExpireIn(now()->addMinutes(30));

        Passport::refreshTokensExpireIn(now()->addMinutes(60));

        Passport::pruneRevokedTokens();
    }
}
