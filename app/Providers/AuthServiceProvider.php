<?php

namespace App\Providers;

use App\Models\InventoryDestination;
use App\Models\InventoryTask;
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

        Gate::define('isActive', fn($user) => $user->isActive($user));
        Gate::define('destination-creator', fn($user, $destination) => $user->destination_creator($destination));
        Gate::define('task-creator', fn($user, $task) => $user->isCreator($task));
        Gate::define('isHead', fn($user) => $user->isHead($user));
        Gate::define('isFinished', fn($user, InventoryDestination $destination) => $destination->isFinished());
        Gate::define('isApproved', fn($user, InventoryDestination $destination) => $destination->isApproved());
        Gate::define('isUnitHead', fn($user, InventoryDestination $destination) => $user->isUnitHead($destination));
        Gate::define('taskIsFinished', fn($user, InventoryTask $task) => $task->isFinished());
    }
}
