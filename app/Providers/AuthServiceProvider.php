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
        'App\Closter' => 'App\Policies\ClosterPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\RecibosNomina' => 'App\Policies\RecibosNominaPolicy',
        'App\Marca' => 'App\Policies\MarcaNominaPolicy',
        'App\Ema' => 'App\Policies\EmaPolicy',
        'App\Eba' => 'App\Policies\EbaPolicy',
        'App\Sua' => 'App\Policies\SuaPolicy',
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
    }
}
