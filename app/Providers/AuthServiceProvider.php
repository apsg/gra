<?php

namespace App\Providers;

use App\Domains\Games\Models\Game;
use App\Domains\Games\Policies\GamePolicy;
use App\Domains\Missions\Models\Mission;
use App\Domains\Missions\Policies\MissionPolicy;
use App\Helpers\RoleHelper;
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
        Game::class    => GamePolicy::class,
        Mission::class => MissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole(RoleHelper::ADMIN) ? true : null;
        });
    }
}
